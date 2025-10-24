@extends('layouts.app')

@section('button')
<a href="/addStory"><button type="button" class="btn btn-primary ml-3">Add Story</button></a>
@endsection

@section('content')
        <div class="container my-5 d-flex justify-content-center">
            <div class="card shadow-lg rounded p-4" style="max-width: 600px; width: 100%;">

                <form action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter story title" required>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content:</label>
                        <textarea class="form-control" id="content" name="content" rows="5" placeholder="Write your story here..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image:</label>
                        <input type="file" id="image" class="form-control" name="image" required>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category:</label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="">-- Select a Category --</option>
                            <option value="Mapenzi & Mahaba">Mapenzi & Mahaba</option>
                            <option value="Maisha">Maisha</option>
                            <option value="Familia">Familia</option>
                            <option value="Ndoto & Mafanikio">Ndoto & Mafanikio</option>
                            <option value="Ucheshi">Ucheshi</option>
                            <option value="Mashaka & Thriller">Mashaka & Thriller</option>
                            <option value="Ushairi & Ufantasia">Ushairi & Ufantasia</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Save Story</button>
                    </div>
                </form>
            </div>
        </div>


    </body>
</html>
@endsection