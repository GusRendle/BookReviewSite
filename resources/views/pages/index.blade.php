@extends('layouts.app')

@section('title', 'All Pages')

@section('content')
    <div class="container">
        <div class="row">
            <div id="root" class="col-md-8">
                <div class="card">
                    <a href="{{ route('pages.create') }}" class="card-header">> Create a new page </a>
                </div>
                <br>
                <table class="table table-bordered mb-5">
                    <thead>
                        <tr class="table-info">
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <th scope="row">{{ $page->id }}</th>
                                <td><a href="{{ route('pages.show', ['page' => $page->id]) }}">{{ $page->title }}</a></td>
                                <td>{{ $page->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $pages->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
