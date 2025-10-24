@extends('layouts.app')

@section('button')
<div>
    <a href="/addStory"><button type="button" class="btn btn-primary ml-3 mb-3">Add Story</button></a>
    <a href="/addStory"><button type="button" class="btn btn-primary ml-3 mb-3">Profile</button></a>
    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-primary mb-3 ml-3">Sign Out</button>
    </form>
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
