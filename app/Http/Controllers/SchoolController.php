<?php

namespace App\Http\Controllers;

use App\School;
use App\Star;
use cebe\markdown\GithubMarkdown;
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
            $stars = Star::where('school','like',$school->school_name)->get();
        }catch (ModelNotFoundException $e){
            abort(404);
        }
        // Document parse
        $parser = new GithubMarkdown();
        $parser->enableNewlines = true;
        $document = $parser->parse($school->document);
        return view('school.show',compact('school','stars','document'));
    }
}
