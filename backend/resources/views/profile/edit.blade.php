@extends('layouts.app')

@section('content')
 <div class="row justify-content-center text-center mb-3 p-2" style="background-color: #ffffff; box-shadow: 2px 0 8px rgba(0, 0, 0, 0.6);">
        <div class="col-12 d-flex flex-column flex-md-row justify-content-center align-items-center container">
            <h1 class="mr-md-5 mb-3 mb-md-0">Stories</h1>
            <div class="d-flex gap-2">
                <a href="{{ route('stories.index', ['category' => 'Mapenzi & Mahaba']) }}" class="btn btn-transparent text-dark border-0"><b>Mapenzi & Mahaba</b></a>
                <a href="{{ route('stories.index', ['category' => 'Maisha']) }}" class="btn btn-transparent text-dark border-0"><b>Maisha</b></a>
                <a href="{{ route('stories.index', ['category' => 'Familia']) }}" class="btn btn-transparent text-dark border-0"><b>Familia</b></a>
                <a href="{{ route('stories.index', ['category' => 'Ndoto & Mafanikio']) }}" class="btn btn-transparent text-dark border-0"><b>Ndoto & Mafanikio</b></a>
                <a href="{{ route('stories.index', ['category' => 'Ucheshi']) }}" class="btn btn-transparent text-dark border-0"><b>Ucheshi</b></a>
                <a href="{{ route('stories.index', ['category' => 'Mashaka & Thriller']) }}" class="btn btn-transparent text-dark border-0"><b>Mashaka & Thriller</b></a>
                <a href="{{ route('stories.index', ['category' => 'Ushairi & Ufantasia']) }}" class="btn btn-transparent text-dark border-0"><b>Ushairi & Ufantasia</b></a>
            </div>
            <a href=""><button type="button" class="btn btn-primary ml-3">Add Story</button></a>
        </div>
    </div> 
<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection