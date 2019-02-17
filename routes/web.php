<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',function(){
	return 'About Engineer Abolfazl Sabagh';
});

Route::get('/book',function(){
	$books = App\Book::all();
	return view('book.archive',compact('books'));
});

Route::get('/book/{id}',function($id){
	$book = App\Book::findOrFail($id);
	return view('book.single',compact('book'));
});

Route::post('/book',function(Illuminate\Http\Request $request){
	App\Book::create($request->all());
});