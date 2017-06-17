<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNews;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        echo 'Hi';
    }

    public function store(StoreNews $request)
    {
        $news = News::create($request->all());

        if (!$news->wasRecentlyCreated) return 'Failed';

        return 'Success';
    }


    public function update(UpdateNews $request, $id)
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


    public function show(News $news)
    {
        return $news;
    }
}
