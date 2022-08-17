@extends('layouts.app')

@section('title', 'Book Page')


@php
echo 'Not Good to use php here!' . '<br>';
echo 'لا ينصح ب استخدامه لانه يمكن احد المخترقين من اختراث موقعك من خلاله ';

@endphp



@section('content')

    @forelse($books as $book)
        book title is {{ $book->title }} <br>
        book pages is {{ $book->pages }} <br>
        User ID is {{ $book->user_id }} <br>
        Loop iteration number is {{ $loop->iteration }} <br><br>
    @empty
        Sorry, there is no books here
    @endforelse

    <form action="./books/create" method="post">
        @csrf   {{-- its for more secure, search for TOKEN --}}

        <select name="user" id="user">
            @foreach($users as $user)
            <option value="{{$user->id}}"> {{$user->name}}</option>
            @endforeach
        </select><br>

        <label for="title">Book Title</label>
        <input type="text" name="title" id="title"> <br>

        <label for="pages">Book Pages</label>
        <input type="number" min="0" max="2000" name="pages" id="pages"> <br>

        <input type="submit" value="Insert">


    </form>

@endsection
