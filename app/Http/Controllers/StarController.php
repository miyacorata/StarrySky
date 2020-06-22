<?php

namespace App\Http\Controllers;

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
        $parser = new GithubMarkdown();
        $parser->enableNewlines = true;
        $document = $parser->parse($star->document);
        return view('star.show',compact('star','document'));
    }
}
