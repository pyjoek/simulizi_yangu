@extends('layouts.app')

@section('button')
<div>
    <a href="/profile/show" class="btn border ml-3 mb-3">
        <i class="bi bi-person"></i> <!-- Bootstrap Profile Icon -->
    </a>
</div>
@endsection

@section('content')
    <!-- Display Stories -->
    <div class="container">
        <div class="row">
            @foreach ($stories as $story)
                @if ($story->category == $category)
                    <div class="col-lg-6 my-4">
                        <div class="story bg-white rounded shadow p-4">
                            <a href="/story/{{$story->id}}">
                                <h2 class="mb-3">{{ $story->title }}</h2>
                            </a>
                            <textarea style="width: 100%; height: 90%; border: none; resize: none;">
                                {{ $story->content }}
                            </textarea>
                            <img src="{{ asset('storage/'.$story->image) }}" 
                                alt="Story Image" 
                                class="img-fluid rounded mt-3"
                                style="width: 300px; height: 200px; object-fit: contain;">
                            <!-- <img src="{{ asset('storage/'.$story->image) }}" alt="Story Image" class="img-fluid rounded mt-3"> -->
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
