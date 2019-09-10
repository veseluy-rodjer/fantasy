<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Title;
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
					$titles = Title::where('title', 'LIKE', "%$keyword%")
						->orderBy($sort, 'desc')->paginate($perPage);
					$opuses = Opus::where('page', 'LIKE', "%$keyword%")
						->orderBy($sort, 'desc')->paginate($perPage);
				}
				else {
					$titles = Title::where('title', 'LIKE', "%$keyword%")
						->orderBy($sort)->paginate($perPage);
					$opuses = Opus::where('page', 'LIKE', "%$keyword%")
						->orderBy($sort)->paginate($perPage);
				}
			}
			else {
				$titles = Title::where('title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
				$opuses = Opus::where('page', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
			}
		}
		else {
			if (!empty($sort)) {
				if ($toggle !== false) {
					$opuses = Opus::orderBy($sort, 'desc')->paginate($perPage);
					$titles = Title::orderBy($sort, 'desc')->paginate($perPage);
				}
				else {
					$opuses = Opus::orderBy($sort)->paginate($perPage);
					$titles = Title::orderBy($sort)->paginate($perPage);
				}
			}
			else {
				$opuses = Opus::latest()->paginate($perPage);
				$titles = Title::latest()->paginate($perPage);
			}
        }
        return view('opuses.index', compact('titles', 'opuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('opuses.create');
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
        $user = \Auth::user();
	    $request->validate([
        'title' => 'required|string|max:255',
        'page' => 'required|string',
	    ]);
		$title = $user->titles()->create(['title' => $request->title]);
		$pages = $request->page;
		if (substr_count($pages, ' ') < 300) {
			$user->opuses()->create(['page' => $pages, 'number_page' => 1, 'title_id' => $title->id]);
			return redirect()->route('opuses.index')->with('flash_message', 'Opus added!');
		}
		$reg = '/(.*\s){300}/U';
		preg_match_all($reg, $pages, $matches);
		$n = 0;
		foreach ($matches[0] as $match) {
			$n += 1;
			$user->opuses()->create(['page' => $match, 'number_page' => $n, 'title_id' => $title->id]);
			$count = strlen($match);

			$pages = substr($pages, $count);
		}
		if ($pages !== '') {
			$user->opuses()->create(['page' => $pages, 'number_page' => $n + 1, 'title_id' => $title->id]);
		}
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
        return view('opuses.show', compact('opus'));
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
        return view('opuses.edit', compact('opus'));
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
	    $request->validate([
        'title' => 'required|string|max:255',
        'page' => 'required|string',
		]);

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

