<?php

namespace App\Http\Controllers;

use App\Star;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class StarController extends Controller
{
    public function index(Request $request){
        return view('star.show');
    }

    public function show($name_r){
        try{
            $star = Star::where('name_r','like',$name_r)->firstOrFail();
        }catch (ModelNotFoundException $e){
            abort(404);
        }
        return view('star.show',compact('star'));
    }
}
