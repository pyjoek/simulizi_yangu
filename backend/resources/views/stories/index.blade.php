<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
              crossorigin="anonymous">

              <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap JS Bundle (with Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->

    </head>
    <body class="font-sans antialiased">
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

    