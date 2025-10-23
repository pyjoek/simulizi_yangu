@extends('layouts.app')

@section('content')
    <!-- Display Stories -->
    <div class="container">
        <div class="row">
            @foreach ($stories as $story)
                @if ($story->category == $category)
                    <div class="col-lg-6 my-4">
                        <div class="story bg-white rounded shadow p-4">
                            <h2 class="mb-3">{{ $story->title }}</h2>
                            <p>{{ $story->content }}</p>
                            <img src="{{ asset('storage/'.$story->image_path) }}" alt="Story Image" class="img-fluid rounded mt-3">
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
