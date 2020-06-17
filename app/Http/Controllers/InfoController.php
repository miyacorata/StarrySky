<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function home(Request $request){
        return view('welcome');
    }
}
