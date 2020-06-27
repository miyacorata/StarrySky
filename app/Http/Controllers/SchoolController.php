<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(Request $request){
        $schools = School::all();
        return view('school.index',compact('schools'));
    }

    public function show($slug){
        try {
            $school = School::where('school_name_slug', 'like', $slug)->firstOrFail();
        }catch (ModelNotFoundException $e){
            abort(404);
        }
        dd($school->toArray());
    }
}
