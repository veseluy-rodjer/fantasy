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
			return $str;
		}
		$reg = '/(.*\/p>.*){3}/U';
		$res = [];
		preg_match_all($reg, $str, $matches);
		foreach ($matches[0] as $match) {
			// \App\Opus::create([''])
			$res[] = $match;
			dd(str_replace($match, '', $str));
		}

		// dd(strlen($str) . '  ' . strlen($matches[0][0]) . '  ' . $matches);
		dd($str);
		// dd(strlen($str) . '  ' . strlen($matches[0][0]));
    	return view('main');
    }
    
}
