@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Category Filter Section -->
    <div class="row justify-content-center text-center mb-3 p-2" style="background-color: #ffffff; box-shadow: 2px 0 8px rgba(0, 0, 0, 0.6);">
        <div class="col-12 d-flex flex-column flex-md-row justify-content-center align-items-center container">
            <h1 class="mr-md-5 mb-3 mb-md-0">Stories</h1>
            <div class="d-flex gap-2">
                <!-- Category Buttons -->
                @foreach(['Mapenzi & Mahaba', 'Maisha', 'Familia', 'Ndoto & Mafanikio', 'Ucheshi', 'Mashaka & Thriller', 'Ushairi & Ufantasia'] as $cat)
                    <a href="{{ route('stories.index', ['category' => $cat]) }}" class="btn btn-transparent text-dark border-0" style="background-color: transparent;">
                        <b>{{ $cat }}</b>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Display Stories by Category -->
    <div class="mt-5">
        @if($stories->count() > 0)
            <div class="row">
                @foreach($stories as $story)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $story->image_path) }}" class="card-img-top" alt="Story Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $story->title }}</h5>
                                <p class="card-text">{{ Str::limit($story->content, 100) }}</p>
                                <a href="{{ route('stories.show', $story->id) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No stories found for the selected category.</p>
        @endif
    </div>

</div>

@endsection
