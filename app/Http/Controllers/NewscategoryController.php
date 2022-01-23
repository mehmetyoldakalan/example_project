<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Exception;
use Illuminate\Http\Request;

class NewscategoryController extends Controller
{
    public function index()
    {
        $newsCategoryData=NewsCategory::all();
        return view('newsCategories',['newsCategoryData'=>$newsCategoryData]);
    }
    public function storeView()
    {
        return view('newsCategoriesAdd');
    }
    public function store (Request $request)
    {
        $request->validate([
            'category_name'=>'required|string'
        ]);
        try {
            NewsCategory::create($request->except('_token'));
            return redirect()->action([NewscategoryController::class,'index'])->with('status','success');
        } catch (Exception $e) {
            return back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
    public function updateView($id)
    {
        $newsCategoryData=NewsCategory::where('id',$id)->get();
        return view('newsCategoryUpdate',['newsCategoryData'=>$newsCategoryData]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name'=>'required|string'
        ]);
        try {
            NewsCategory::where('id',$id)->update($request->except('_token'));
            return redirect()->action([NewscategoryController::class,'index'])->with('status','success');
        } catch (Exception $e) {
            return back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {
            NewsCategory::where('id',$id)->delete();
            return redirect()->action([NewscategoryController::class,'index'])->with('status','success');
        } catch (Exception $e) {
            return back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
