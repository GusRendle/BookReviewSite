@extends('layouts.app')
@section('title')
{{$review->page->user->name}}'s review of {{$review->book->title}}
@endsection

@section('content')
<p> {{$review->postDate}} </p>

<h3> {{$review->title}} </h3>

<p> {{$review->content}} </p>

<form method="POST" 
    action="{{ route('reviews.destroy', ['review' => $review->id]) }}"> 

    @csrf

    @method('DELETE')

    <button type="submit"> Delete </button>

</form>

<h4> Comments </h4>
<ul>
@foreach($review->comments as $comment)
    <li><a href="{{ route('pages.show',['page'=>$comment->user->page->id]) }}">{{$comment->user->name}}</a> @ {{$comment->postDate}}: {{$comment->content}}</li>
@endforeach
</ul>

<a href="{{ route('books.show',['ISBN'=>$review->ISBN]) }}">Other reviews of {{$review->book->title}}</a>
<a href="{{ route('pages.show',['page'=>$review->page->id]) }}">{{$review->page->user->name}}'s page</a>
@endsection