@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $story->title }}</h1>
        <p>{{ $story->content }}</p>
        <img src="{{ asset('storage/' . $story->image) }}" alt="{{ $story->title }}">
    </div>
@endsection
