@extends('layouts.app')

@section('title')
Editing {{$page->user->name}}'s page
@endsection

@section('content')

    <form method="POST" action="{{ route('pages.update',$page->id) }}">

        @csrf
        @method('PUT')

        <p>Title: <input type="text" name="title" value="{{ $page->title }}"></p>

        <p>Description: <input type="text" name="description" value="{{ $page->description }}"></p>

        <input type="submit" value="Submit">

        <a href="{{ route('pages.index') }}">Cancel</a>

    </form>
@endsection