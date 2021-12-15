@extends('layouts.app')

@section('title', 'All Reviews')

@section('content')
    {{-- <a href="{{route('users.create')}}"> Register a New User </a> --}}
    <ul>
        @foreach($reviews as $review)
            <li><a href="{{ route('reviews.show',['id'=>$review->id]) }}">{{$review->page->user->name}}'s review of {{$review->book->title}}</a></li>
        @endforeach
    </ul>
@endsection