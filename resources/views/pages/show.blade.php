@extends('layouts.app')
@section('title')
{{$page->user->name}}'s page - {{$page->title}}
@endsection

@section('content')

<p> {{$page->description}} </p>

<h4> {{$page->user->name}}'s details </h4>
<ul>
    <li> Email: {{$page->user->email}}</li>
    <li> Email Verified: {{$page->user->email_verified_at ?? 'Unknown'}}</li>
</ul>

<h4> {{$page->user->name}}'s book reviews </h4>
<ul>
@foreach($page->reviews as $review)
    <li><a href="{{ route('reviews.show',['id'=>$review->id]) }}">{{$review->book->title}} - {{$review->title}}</a></li>
@endforeach
</ul>

<h4> Comments </h4>
<ul>
@foreach($page->comments as $comment)
    <li><a href="{{ route('pages.show',['id'=>$comment->user->page->id]) }}">{{$comment->user->name}}</a> @ {{$comment->postDate}}: {{$comment->content}}</li>
@endforeach
</ul>

<a href="{{route('pages.index')}}">All Pages</a>
@endsection