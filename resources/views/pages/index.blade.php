@extends('layouts.app')

@section('title', 'All Pages')

@section('content')
    {{-- <a href="{{route('users.create')}}"> Register a New User </a> --}}
    <ul>
        @foreach($pages as $page)
            <li><a href="{{ route('pages.show',['id'=>$page->id]) }}">{{$page->user->name}}'s page</a></li>
        @endforeach
    </ul>
@endsection