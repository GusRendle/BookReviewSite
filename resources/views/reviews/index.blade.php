@extends('layouts.app')

@section('title', 'All Reviews')

@section('content')
    <div class="container">
        <div class="row">
            <div id="root" class="col-md-8">
                <div class="card">
                    <a href="{{ route('reviews.create') }}" class="card-header">> Create a new review </a>
                </div>
                <br>
                <table class="table table-bordered mb-5">
                    <thead>
                        <tr class="table-info">
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Reviewer</th>
                            <th scope="col">Book</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <th scope="row">{{ $review->id }}</th>
                                <td><a href="{{ route('reviews.show', ['review' => $review->id]) }}">{{ $review->title }}</a></td>
                                <td>{{ $review->page->user->name }}</td>
                                <td>{{ $review->book->title }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $reviews->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
