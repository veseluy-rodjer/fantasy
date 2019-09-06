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
		$str = 'qwertyuiop</p>asdfghjh';
		$rez = strstr($str, 't');
		dd($str . '   ' . $rez);
    	return view('main');
    }
    
}
