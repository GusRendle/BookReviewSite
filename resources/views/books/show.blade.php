@extends('layouts.app')
@section('title')
    {{ $book->title }} by {{ $book->author }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div id="root" class="col-md-8">
                <div class="card">
                    <h5 class="card-header">{{ $book->title }}</h5>
                    <div class="card-body">
                        ISBN: {{ $book->ISBN }}
                        <br>
                        Publisher: {{ $book->publisher }}
                        <br>
                        Author: {{ $book->author }}
                    </div>
                </div>
                <br>
                <div class="card">
                    <h5 class="card-header">Description</h5>
                    <div class="card-body">
                        {{ $book->description }}
                    </div>
                </div>
                <br>
                <div class="card">
                    <h5 class="card-header">Reviews of {{ $book->title }}</h5>
                    <ul style="list-style-type: none">
                        @foreach ($book->reviews as $review)
                            <li>
                                <a href="{{ route('reviews.show', ['review' => $review->id]) }}">{{ $review->title }}
                                    -
                                    {{ $review->page->user->name }}</a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
