<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return response()->json($news);
    }

    public function store(Request $request)
    {
        $news = News::create($request->all());

        if (!$news->wasRecentlyCreated) return 'Failed';

        return 'Success';
    }


    public function update(Request $request, $id)
    {
        $news = News::find($id);
        $news->title = $request->input('title', '');
        $news->permalink = $request->input('permalink', '');
        $news->content = $request->input('content', '');
        $news->created_by = 1;
        $news->updated_by = 1;
        $news->save();

        if (!$news) return 'Failed';


        return 'Success';
    }

    public function show($id)
    {
        $news = News::find($id);

        return $news;
    }


    public function test(Request $request, $param1, $param2)
    {
        return response()->json([
            'param1' =>  $param1,
            'param1-uri' => request()->route()->parameters['param1'],
            'param2' => $param2,
            'param2-uri' => request()->route()->parameters['param2']
        ]);
    }
}
