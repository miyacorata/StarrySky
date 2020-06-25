<?php

namespace App\Http\Controllers;

use App\School;
use App\Star;
use cebe\markdown\GithubMarkdown;
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
        // Document parse
        $parser = new GithubMarkdown();
        $parser->enableNewlines = true;
        $document = $parser->parse($star->document);
        // School emblem
        try{
            $school = School::where('school_name','like',$star->school)->firstOrFail();
            $emblem = $school->school_name_slug;
        }catch (ModelNotFoundException $e){
            $emblem = null;
        }
        return view('star.show',compact('star','document','emblem'));
    }
}
