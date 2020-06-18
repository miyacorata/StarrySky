<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StarController extends Controller
{
    public function index(Request $request){
        return view('star.show');
    }

    public function show(Request $request){
        //
    }
}
