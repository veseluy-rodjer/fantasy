<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TestController extends Controller
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
					$tests = Test::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orderBy($sort, 'desc')->paginate($perPage);
				}
				else {
					$tests = Test::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orderBy($sort)->paginate($perPage);
				}
			}
			else {
				$tests = Test::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
			}
		}
		else {
			if (!empty($sort)) {
				if ($toggle !== false) {
					$tests = Test::orderBy($sort, 'desc')->paginate($perPage);
				}
				else {
					$tests = Test::orderBy($sort)->paginate($perPage);
				}
			}
			else {
				$tests = Test::latest()->paginate($perPage);
			}
        }
        return view('admin.tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tests.create');
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
                if ($request->has('photo')) {
            $photoName = str_random(40) . '.' . $request->photo->extension();
            $requestData['photo'] = $photoName;
        }

        $store = Test::create($requestData);
                if ($request->has('photo')) {
            $path = '/uploads/tests/' . $store->id . '/';
            Storage::makeDirectory($path );
            Image::make($request->photo)->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($path . $photoName));
            Image::make($request->photo)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($path . 'big' . $photoName));
        }

        return redirect()->route('tests.index')->with('flash_message', 'Test added!');
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
        $test = Test::findOrFail($id);
        return view('admin.tests.show', compact('test'));
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
        $test = Test::findOrFail($id);
        return view('admin.tests.edit', compact('test'));
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
        
        $up = Test::findOrFail($id);
        $requestData = $request->all();
                if ($request->has('photo')) {
            $photoName = str_random(40) . '.' . $request->photo->extension();
            $requestData['photo'] = $photoName;
            $path = '/uploads/tests/' . $up->id . '/';
            if (!empty($up->photo)) {
                Storage::delete($path . $up->photo);
                Storage::delete($path . 'big' . $up->photo);
            }
            Storage::makeDirectory($path );
            Image::make($request->photo)->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($path . $photoName));
            Image::make($request->photo)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($path . 'big' . $photoName));
        }

        $up->update($requestData);
        return redirect()->route('tests.index')->with('flash_message', 'Test updated!');
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
        $del = Test::findOrFail($id);
                if (!empty($del->photo)) {
            $path = '/uploads/tests/' . $del->id . '/';
                Storage::deleteDirectory($path);
        }

        $del->delete();
        return redirect()->route('tests.index')->with('flash_message', 'Test deleted!');
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
				$del = Test::findOrFail($key);
				        if (!empty($del->photo)) {
            $path = '/uploads/tests/' . $del->id . '/';
                Storage::deleteDirectory($path);
        }

				$del->delete();
			}
		}
        return redirect()->route('tests.index')->with('flash_message', 'Test deleted!');
	}
}

