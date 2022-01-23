<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\News;
use App\Models\NewsCategory;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class NewsController extends Controller
{
    public function index()
    {
        $newsData=News::
        join('authors','authors.id','news.author_id')
        ->join('news_categories','news_categories.id','news.news_category_id')
        ->get();
        return view('news',['newsData'=>$newsData]);
    }
    public function storeView()
    {
        $categoryData=NewsCategory::all();
        $authorData=Author::all();
        return view('newsAdd',['authorData'=>$authorData,'categoryData'=>$categoryData]);
    }
    public function store (Request $request)
    {
        $request->validate([
            'author_id'=>'required|integer',
            'news_category_id'=>'required|integer',
            'news_title'=>'required|string',
            'news_coverletter'=>'required|string',
            'news_content'=>'required|string',
        ]);
        try {
            News::create($request->except('_token'));
            return redirect()->action([NewsController::class,'index'])->with('status','success');
        } catch (Exception $e) {
            return back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
    public function updateView($id)
    {
        $categoryData=NewsCategory::all();
        $authorData=Author::all();
        $newsData=News::where('news_id',$id)->get();
        return view('newsUpdate',['newsData'=>$newsData,'authorData'=>$authorData,'categoryData'=>$categoryData]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'author_id'=>'required|integer',
            'news_category_id'=>'required|integer',
            'news_title'=>'required|string',
            'news_coverletter'=>'required|string',
            'news_content'=>'required|string',
        ]);
        try {
            News::where('news_id',$id)->update($request->except('_token'));
            return redirect()->action([NewsController::class,'index'])->with('status','success');
        } catch (Exception $e) {
            return back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {
            News::where('news_id',$id)->delete();
            return redirect()->action([NewsController::class,'index'])->with('status','success');
        } catch (Exception $e) {
            return back()->withErrors(['msg' => $e->getMessage()]);
        }

    }
}
