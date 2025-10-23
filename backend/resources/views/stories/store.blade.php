@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Displaying success or error messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Add New Story</h2>
    <form action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title" class="col-form-label">Title:</label>
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                value="{{ old('title') }}"
                required
            />
        </div>

        <div class="form-group">
            <label for="content" class="col-form-label">Content:</label>
            <textarea
                class="form-control"
                id="content"
                name="content"
                required>{{ old('content') }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input
                type="file"
                class="form-control"
                id="image"
                name="image"
                accept="image/*"
                required
            />
        </div>

        <div class="form-group">
            <label for="category" class="col-form-label">Category:</label>
            <select
                class="form-control"
                id="category"
                name="category"
                required
            >
                <option value="Mapenzi & Mahaba" {{ old('category') == 'Mapenzi & Mahaba' ? 'selected' : '' }}>Mapenzi & Mahaba</option>
                <option value="Maisha" {{ old('category') == 'Maisha' ? 'selected' : '' }}>Maisha</option>
                <option value="Familia" {{ old('category') == 'Familia' ? 'selected' : '' }}>Familia</option>
                <option value="Ndoto & Mafanikio" {{ old('category') == 'Ndoto & Mafanikio' ? 'selected' : '' }}>Ndoto & Mafanikio</option>
                <option value="Ucheshi" {{ old('category') == 'Ucheshi' ? 'selected' : '' }}>Ucheshi</option>
                <option value="Mashaka & Thriller" {{ old('category') == 'Mashaka & Thriller' ? 'selected' : '' }}>Mashaka & Thriller</option>
                <option value="Ushairi & Ufantasia" {{ old('category') == 'Ushairi & Ufantasia' ? 'selected' : '' }}>Ushairi & Ufantasia</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Story</button>
    </form>
</div>

@endsection
