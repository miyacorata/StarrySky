<?php

namespace App\Http\Controllers;

use App\School;
use App\Star;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class StarController extends Controller
{
    public function index(Request $request){
        $stars = Star::all();
        return view('star.index',compact('stars'));
    }

    public function show($name_r){
        try{
            $star = Star::where('name_r','like',$name_r)->firstOrFail();
        }catch (ModelNotFoundException $e){
            abort(404);
        }
        // School emblem & slag
        try{
            $school = School::where('school_name','like',$star->school)->firstOrFail();
        }catch (ModelNotFoundException $e){
            $school = null;
        }
        return view('star.show',compact('star','school'));
    }
}
