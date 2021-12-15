@extends('layouts.app')

@section('title', 'All Reviews')

@section('content')
    <a href="{{route('reviews.create')}}"> Create a new review </a>
    <ul>
        @foreach($reviews as $review)
            <li><a href="{{ route('reviews.show',['review'=>$review->id]) }}">{{$review->page->user->name}}'s review of {{$review->book->title}}</a></li>
        @endforeach
    </ul>
@endsection