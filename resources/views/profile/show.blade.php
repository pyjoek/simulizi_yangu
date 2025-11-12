@extends('layouts.app')

@section('button')
<div>
    <a href="/profile" class="btn border ml-3 mb-3">
        <i class="bi bi-person"></i> <!-- Bootstrap Profile Icon -->
    </a>
    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger mb-3 ml-3">
            <i class="bi bi-box-arrow-right"></i> <!-- Bootstrap Logout Icon -->
        </button>
    </form>

</div>
@endsection


@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="mt-5 py-12">
        <div class="container">
            <div class="row g-4">  <!-- Grid system to create responsive layout -->
                <div class="col-lg-8">
                    <h1>Karibu, {{ auth()->user()->name }}</h1>
                    <h6>Simamia hadithi zako na andika mpya</h6>
                </div>

                <!-- buttons -->
                <div class="col-lg-4">
                    <a href="/profile" class="btn border ml-3 mb-3">
                         Settings
                    </a>
                    <a href="/addStory" class="btn btn-primary ml-3 mb-3">
                        <i class="bi bi-pencil-square"></i> Add Story<!-- Bootstrap Add Story Icon -->
                    </a>
                </div>

                <h1>Hadithi Zangu</h1>
                <div class="">
                    <div class="container">
                        <div class="row">
                            @foreach ($stories as $story)
                                <div class="col-lg-6 my-4">
                        <div class="story bg-white rounded shadow p-4">
                            <a href="/story/{{$story->id}}" style="text-decoration: none; color: black">
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End of container -->
    </div>

@endsection