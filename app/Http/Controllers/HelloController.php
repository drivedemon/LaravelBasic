<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    function showHello ($name) {
        return '<h2>hello first controller : '.$name.'</h2>';
    }
    function show () {
        return view('create.users')
                ->with('name', 'drive')
                ->with('title', 'test');
    }
}
