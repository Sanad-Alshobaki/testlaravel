<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
class BooksController extends Controller
{
    public function index()
    {
        $users = User::select('id','name')->get();
        $books = Book::all();
       // $books = Book::where('title','=','hello');

        return view('home',compact('books','users'));
        // return $books;
    }

    public function store()
    {   
        $validateData = request()->validate([
            'title' => 'required',
            'pages' => 'required|numeric|min:1',        // number and min number is 1
        ]);

        $user = User::find(request()->user);

        $book = new Book();
        $book -> title = request() -> title;
        $book -> pages = request() -> pages;

        $user->books()->save($book);
        
        // return request();    // show all information sent from the form post 
        return back();          // return u back to the page contain form
    }

}
