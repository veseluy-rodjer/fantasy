<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Opus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OpusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        $perPage = $request->pages ?? 10;
		$sort = $request->sort;
		$toggle = stripos($request->toggle, 'glyphicon-arrow-up');

		if (!empty($keyword)) {
			if (!empty($sort)) {
				if ($toggle !== false) {
					$opuses = Opus::where('title', 'LIKE', "%$keyword%")
                ->orWhere('text', 'LIKE', "%$keyword%")
                ->orderBy($sort, 'desc')->paginate($perPage);
				}
				else {
					$opuses = Opus::where('title', 'LIKE', "%$keyword%")
                ->orWhere('text', 'LIKE', "%$keyword%")
                ->orderBy($sort)->paginate($perPage);
				}
			}
			else {
				$opuses = Opus::where('title', 'LIKE', "%$keyword%")
                ->orWhere('text', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
			}
		}
		else {
			if (!empty($sort)) {
				if ($toggle !== false) {
					$opuses = Opus::orderBy($sort, 'desc')->paginate($perPage);
				}
				else {
					$opuses = Opus::orderBy($sort)->paginate($perPage);
				}
			}
			else {
				$opuses = Opus::latest()->paginate($perPage);
			}
        }
        return view('opuses.opuses.index', compact('opuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('opuses.opuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        $store = Opus::create($requestData);
        
        return redirect()->route('opuses.index')->with('flash_message', 'Opus added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $opus = Opus::findOrFail($id);
        return view('opuses.opuses.show', compact('opus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $opus = Opus::findOrFail($id);
        return view('opuses.opuses.edit', compact('opus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $up = Opus::findOrFail($id);
        $requestData = $request->all();
        
        $up->update($requestData);
        return redirect()->route('opuses.index')->with('flash_message', 'Opus updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $del = Opus::findOrFail($id);
        
        $del->delete();
        return redirect()->route('opuses.index')->with('flash_message', 'Opus deleted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function arrDelete(Request $request)
	{
		foreach ($request->all() as $key => $value) {
			if ($value == 1) {
				$del = Opus::findOrFail($key);
				
				$del->delete();
			}
		}
        return redirect()->route('opuses.index')->with('flash_message', 'Opus deleted!');
	}
}

