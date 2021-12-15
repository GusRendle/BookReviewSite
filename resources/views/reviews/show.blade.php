@extends('layouts.app')
@section('title')
{{$review->page->user->name}}'s review of {{$review->book->title}}
@endsection

@section('content')
<p> {{$review->postDate}} </p>

<h3> {{$review->title}} </h3>

<p> {{$review->content}} </p>

<h4> Comments </h4>
<ul>
@foreach($review->comments as $comment)
    <li><a href="{{ route('pages.show',['id'=>$comment->user->page->id]) }}">{{$comment->user->name}}</a> @ {{$comment->postDate}}: {{$comment->content}}</li>
@endforeach
</ul>

<a href="{{ route('books.show',['ISBN'=>$review->ISBN]) }}">Other reviews of {{$review->book->title}}</a>
<a href="{{ route('pages.show',['id'=>$review->page->id]) }}">{{$review->page->user->name}}'s page</a>
@endsection