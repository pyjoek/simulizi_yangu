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

    <div class="py-12">
        <div class="container">
            <div class="row g-4">  <!-- Grid system to create responsive layout -->
                <a href="/addStory" class="btn btn-primary ml-3 mb-3">
                    <i class="bi bi-pencil-square"></i> Add Story<!-- Bootstrap Add Story Icon -->
                </a>
                <a href="/profile" class="btn btn-primary ml-3 mb-3">
                    <i class="bi bi-pencil-square"></i> Settings<!-- Bootstrap Add Story Icon -->
                </a>
            </div>
        </div> <!-- End of container -->
    </div>

@endsection