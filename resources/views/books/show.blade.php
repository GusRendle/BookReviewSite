@extends('layouts.app')
@section('title')
{{$book->title}} by {{$book->author}}
@endsection

@section('content')

<p> {{$book->description}} </p>

<ul>
    <li> ISBN: {{$book->ISBN}}</li>
    <li> Publisher: {{$book->publisher}}</li>
</ul>

<h4> Reviews of {{$book->title}}</h4>
<ul>
@foreach($book->reviews as $review)
    <li><a href="{{ route('reviews.show',['review'=>$review->id]) }}">{{$review->title}} - {{$review->page->user->name}}</a></li>
@endforeach
</ul>

<a href="{{route('books.index')}}">All Books</a>
@endsection