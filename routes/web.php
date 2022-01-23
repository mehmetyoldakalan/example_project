<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\NewscategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',function(){
    return view('auth.login');
});
Route::prefix('/admin')->middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('homePage');
    })->name('homePage');
    Route::get('/news',[NewsController::class,'index'])->name('news');
    Route::get('/newsadd',[NewsController::class,'storeView']);
    Route::post('/newsadd',[NewsController::class,'store'])->name('news/add');
    Route::get('/newsdelete/{id}',[NewsController::class,'destroy']);
    Route::get('/newsupdate/{id?}',[NewsController::class,'updateView'])->name('newsUpdateView');
    Route::post('/newsupdate/{id}',[NewsController::class,'update'])->name('newsUpdate');

    Route::get('/news/categories',[NewscategoryController::class,'index'])->name('news/categories');
    Route::get('/news/categories/delete/{id}',[NewscategoryController::class,'destroy']);
    Route::get('/news/categories/add',[NewscategoryController::class,'storeView'])->name('news/categories/add/view');
    Route::post('/news/categories/add',[NewscategoryController::class,'store'])->name('news/categories/add');
    Route::get('/news/categories/update/{id}',[NewscategoryController::class,'updateView'])->name('news/categories/update/view');
    Route::post('/news/categoies/update/{id}',[NewscategoryController::class,'update'])->name('newsCategoryUpdate');

    Route::get('/authors',[AuthorController::class,'index'])->name('authors');
    Route::get('/authors/add',[AuthorController::class,'storeView'])->name('authors/add/view');
    Route::post('/authors/add',[AuthorController::class,'store'])->name('author/add');
    Route::get('/authors/delete/{id}',[AuthorController::class,'destroy']);
    Route::get('/author/update/{id}',[AuthorController::class,'updateView'])->name('author/update/view');
    Route::post('/author/update/{id}',[AuthorController::class,'update'])->name('author/update');

});






require __DIR__.'/auth.php';
