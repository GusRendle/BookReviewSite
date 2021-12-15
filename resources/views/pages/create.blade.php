@extends('layouts.app')

@section('title','Create a new blog page')

@section('content')
    <form method="POST" action="{{ route('pages.store')}}">

        @csrf

        <p>Title: <input type="text" name="title" value="{{ old('title') }}"></p>

        <p>Description: <input type="text" name="description" value="{{ old('description') }}"></p>

        <input type="submit" value="Submit">

        <a href="{{ route('pages.index') }}">Cancel</a>

    </form>
@endsection