<?php

namespace App\Http\Controllers;

use App\Page;
use cebe\markdown\GithubMarkdown;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(!empty($request->get('category'))){
            $category = $request->get('category');
            $query = 'カテゴリ：'.$category;
            $pages = Page::where('category','like',"%{$category}%")->get();
            return view('page.result',compact('query','pages'));
        }
        if(!empty($request->get('q'))){
            $query_text = mb_convert_kana($request->get('q'), 's');
            $query = '単語検索：'.$query_text;
            // 配列変換
            $query_array = explode(' ', $query_text);
            // AND検索
            $pages = Page::select('*');
            foreach ($query_array as $word){
                $pages = $pages->orWhere('title','like',"%{$word}%")
                    ->orWhere('document','like',"%{$word}%");
            }
            $pages = $pages->get();
            return view('page.result',compact('query','pages','query_text'));
        }

        // 記事件数
        $count = Page::all()->count();
        // 最近の更新
        $recent = Page::orderBy('updated_at','desc')->limit(5)->get();
        return view('page.index',compact('count','recent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        //
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($title_path)
    {
        $title = str_replace('_',' ',$title_path);
        try {
            $page = Page::where('title','like',$title)->firstOrFail();
        }catch (ModelNotFoundException $e){
            abort(404,'"'.$title.'"というページは存在しません');
        }
        return view('page.show',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        //
    }*/
}
