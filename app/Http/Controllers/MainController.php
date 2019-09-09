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
		$str = 'qwer</p>tyuiop</p>as</p>dfg</p>hjh</p>fdhfgh';
		if (substr_count($str, '/p>') < 1) {
			dd($str);
			return $str;
		}
		$reg = '/(.*\/p>.*){2}/U';
		$res = [];
		preg_match_all($reg, $str, $matches);
		dd($matches);
		foreach ($matches[0] as $match) {
			// \App\Opus::create([''])
			$res[] = $match;
		}

		$rez = strstr($str, 't');
		// dd(strlen($str) . '  ' . strlen($matches[0][0]) . '  ' . $matches);
		dd($matches);
		// dd(strlen($str) . '  ' . strlen($matches[0][0]));
    	return view('main');
    }
    
}
