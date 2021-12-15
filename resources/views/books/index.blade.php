@extends('layouts.app')

@section('title', 'All Books')

@section('content')
    {{-- <a href="{{route('users.create')}}"> Register a New User </a> --}}
    <ul>
        @foreach($books as $book)
            <li><a href="{{ route('books.show',['ISBN'=>$book->ISBN]) }}">'{{$book->title}}' by {{$book->author}}</a></li>
        @endforeach
    </ul>
@endsection