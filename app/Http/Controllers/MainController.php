<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display main page
     *
     * @return \Illuminate\View\View
     */
    public function main()
    {
    	return view('main');
    }
    
}
