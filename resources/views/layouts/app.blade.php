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

        <!-- Add this inside <head> in your main layout blade file -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


        <!-- Bootstrap JS Bundle (with Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

        <!-- Scripts -->

    </head>
    <body class="font-sans antialiased">
         <div class="row justify-content-center text-center mb-3 p-2" style="background-color: #ffffff; box-shadow: 2px 0 8px rgba(0, 0, 0, 0.6);">
             <h1 class="mr-md-5 mb-3 mb-md-0">Siri Yangu</h1>
            <div class="col-12 d-flex flex-column flex-md-row justify-content-center align-items-center container">
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('stories.index', ['category' => 'Mapenzi & Mahaba']) }}" class="btn btn-transparent text-dark border-0"><b>Mapenzi & Mahaba</b></a>
                    <a href="{{ route('stories.index', ['category' => 'Maisha']) }}" class="btn btn-transparent text-dark border-0"><b>Maisha</b></a>
                    <a href="{{ route('stories.index', ['category' => 'Familia']) }}" class="btn btn-transparent text-dark border-0"><b>Familia</b></a>
                    <a href="{{ route('stories.index', ['category' => 'Ndoto & Mafanikio']) }}" class="btn btn-transparent text-dark border-0"><b>Ndoto & Mafanikio</b></a>
                    <a href="{{ route('stories.index', ['category' => 'Ucheshi']) }}" class="btn btn-transparent text-dark border-0"><b>Ucheshi</b></a>
                    <a href="{{ route('stories.index', ['category' => 'Mashaka & Thriller']) }}" class="btn btn-transparent text-dark border-0"><b>Mashaka & Thriller</b></a>
                    <a href="{{ route('stories.index', ['category' => 'Ushairi & Ufantasia']) }}" class="btn btn-transparent text-dark border-0"><b>Ushairi & Ufantasia</b></a>
                    @yield('button')
                </div>
            </div>
        </div>
        @yield('content')
    </body>
</html>
