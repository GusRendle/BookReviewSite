@extends('layouts.app')

@section('title', 'All Books')

@section('content')
    <div class="container">
        <div class="row">
            <div id="root" class="col-md-8">
                <table class="table table-bordered mb-5">
                    <thead>
                        <tr class="table-info">
                            <th scope="col">ISBN</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Publisher</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <th scope="row">{{ $book->ISBN }}</th>
                                <td><a href="{{ route('books.show', ['ISBN' => $book->ISBN]) }}">{{ $book->title }}</a>
                                </td>
                                <td>{{ $book->suthor }}</td>
                                <td>{{ $book->publisher }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $books->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
