@extends('layouts.app')

@section('button')
<div>
    <a href="/profile/show" class="btn border ml-3 mb-3">
        <i class="bi bi-person"></i> <!-- Bootstrap Profile Icon -->
    </a>
</div>
@endsection

@section('content')
<div class="container my-5">
    <article class="bg-white p-5 rounded shadow-sm mx-auto" style="max-width: 800px; line-height: 1.8; font-family: 'Georgia', serif;">
        
        <!-- Article Title -->
        <h1 class="mb-4 text-center" style="font-size: 2.5rem; font-weight: bold;">
            {{ $story->title }}
        </h1>

        <!-- Article Image -->
        @if ($story->image)
            <img src="{{ asset('storage/' . $story->image) }}" 
                 alt="{{ $story->title }}" 
                 class="img-fluid rounded my-4 d-block mx-auto"
                 style="max-height: 400px; width: 100%; object-fit: contain;">
        @endif

        <!-- Article Content -->
        <div class="content" style="font-size: 1.1rem; color: #333; text-align: justify;">
            <p>{{ $story->content }}</p>
        </div>

    </article>
</div>
@endsection
