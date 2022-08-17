<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\CssSelector\Node\FunctionNode;

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


// for post form in home.blade.php
Route::post('/books/create','App\Http\Controllers\BooksController@store');

Route::get('/books','App\Http\Controllers\BooksController@index');


Route::get('/testing','App\Http\Controllers\TestsController@index');

// Route::get('/testing','TestsController@index');     >> Error


/* ******************************************************************************************* */

// redirect user after being in '/' to the '/login' page
# first way >>
/* Route::redirect('/','/login');

Route::get('login', function(){
    return 'login page';
}); */

#another way
Route::get('/', function(){
    return redirect('login');
});

/* Route::get('/login', function(){
    return 'login page';
})->name('login');  // we give Route a name 'login' for redirect
 */
/* ******************************************************************************************* */


// '/' it's for the start of our project
Route::get('/{name?}', function () {
    return view('welcome');
});

// we get id,catId objects from the request() function, which user write in the url http://127.0.0.1:8000/books/1485/category/5
Route::get('/books/{id}/category/{catId}', function () {
    return 'book num '.request()->id .'<br>'.
    ' category id '.request()->catId;
});
