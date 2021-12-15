@extends('layouts.app')

@section('title','Post a new Review')

@section('content')
    <form method="POST" action="{{ route('reviews.store')}}">

        @csrf

        <p>ISBN: <input type="text" name="ISBN" value="{{ old('ISBN') }}"></p>

        <p>Title: <input type="text" name="title" value="{{ old('title') }}"></p>

        <p>Content: <input type="text" name="content" value="{{ old('content') }}"></p>

        <input type="submit" value="Submit">

        <a href="{{ route('reviews.index') }}">Cancel</a>

    </form>
@endsection