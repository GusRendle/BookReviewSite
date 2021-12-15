@extends('layouts.app')

@section('title','Post a new Review')

@section('content')
    <form method="POST" action="{{ route('reviews.store')}}">

        @csrf

        <p>Book: 
            <select name="ISBN">
                 @foreach ($books as $book)
                    <option value="{{ $book->ISBN }}"
                        @if ($book->ISBN == old('ISBN'))
                            selected="selected"
                        @endif
                        >{{ $book->title }}
                    </option>
                 @endforeach
            </select>
        </p>

        <p>Title: <input type="text" name="title" value="{{ old('title') }}"></p>

        <p>Content: <input type="text" name="content" value="{{ old('content') }}"></p>

        <input type="submit" value="Submit">

        <a href="{{ route('reviews.index') }}">Cancel</a>

    </form>
@endsection