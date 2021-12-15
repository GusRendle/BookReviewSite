@extends('layouts.app')

@section('title', 'All Pages')

@section('content')
    <a href="{{route('pages.create')}}"> Create a new Page </a>
    <ul>
        @foreach($pages as $page)
            <li><a href="{{ route('pages.show',['page'=>$page->id]) }}">{{$page->user->name}}'s page</a></li>
        @endforeach
    </ul>
@endsection