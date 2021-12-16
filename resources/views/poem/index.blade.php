@extends('layouts.app')

@section('title', 'Poem of the Day')

@section('content')

    <h1>
        {{ $poem['title'] }} by {{ $poem['poet']['name'] }}
    </h1>
    <p>
        {!! nl2br(e($poem['content'])) !!}
    </p>
@endsection