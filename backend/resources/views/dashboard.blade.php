@extends('layouts.app')

@section('content')
    <!-- Modal for adding a new story -->
        <!-- <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Story</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="col-form-label">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="content" class="col-form-label">Content:</label>
                                <textarea class="form-control" id="content" name="content" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Image:</label>
                                <input type="file" id="image" class="form-control" name="image" required>
                            </div>
                            <div class="form-group">
                                <label for="category" class="col-form-label">Category:</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="Mapenzi & Mahaba">Mapenzi & Mahaba</option>
                                    <option value="Maisha">Maisha</option>
                                    <option value="Familia">Familia</option>
                                    <option value="Ndoto & Mafanikio">Ndoto & Mafanikio</option>
                                    <option value="Ucheshi">Ucheshi</option>
                                    <option value="Mashaka & Thriller">Mashaka & Thriller</option>
                                    <option value="Ushairi & Ufantasia">Ushairi & Ufantasia</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Story</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

    <!-- Navigation Bar -->
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
            <a href="/login"><button type="button" class="btn btn-primary ml-3">Sign In / Sing Out</button></a>
        </div>
    </div>

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
