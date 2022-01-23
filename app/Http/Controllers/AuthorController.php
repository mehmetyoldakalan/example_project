<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Exception;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authorsData=Author::all();
        return view('authors',['authorsData'=>$authorsData]);
    }
    public function storeView ()
    {
        return view('authorAdd');
    }
    public function store (Request $request)
    {
        $request->validate([
            'author_name'=>'required|string',
            'author_surname'=>'required|string'
        ]);
        try {
            Author::create($request->except('_token'));
            return redirect()->action([AuthorController::class,'index'])->with('status','success');
        } catch (Exception $e) {
            return back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
    public function updateView($id)
    {
        $authorData=Author::where('id',$id)->get();
        return view('authorUpdate',['authorData'=>$authorData]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'author_name'=>'required|string',
            'author_surname'=>'required|string',
        ]);
        try {
            Author::where('id',$id)->update($request->except('_token'));
            return redirect()->action([AuthorController::class,'index'])->with('status','success');
        } catch (Exception $e) {
            return back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {
            Author::where('id',$id)->delete();
            return redirect()->action([AuthorController::class,'index'])->with('status','success');
        } catch (Exception $e) {
            return back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
