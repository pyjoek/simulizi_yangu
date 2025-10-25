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
                    <a href="/login" class="btn btn-transparent text-dark border-0"><b>Mapenzi & Mahaba</b></a>
                    <a href="/login" class="btn btn-transparent text-dark border-0"><b>Maisha</b></a>
                    <a href="/login" class="btn btn-transparent text-dark border-0"><b>Familia</b></a>
                    <a href="/login" class="btn btn-transparent text-dark border-0"><b>Ndoto & Mafanikio</b></a>
                    <a href="/login" class="btn btn-transparent text-dark border-0"><b>Ucheshi</b></a>
                    <a href="/login" class="btn btn-transparent text-dark border-0"><b>Ushairi & Ufantasia</b></a>
                    <a href="/login" class="btn btn-transparent text-dark border-0"><b>Mashaka & Thriller</b></a>
                    @yield('button')
                </div>
            </div>
        </div>
        
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="text-center" style="max-width: 900px; width: 100%;">
                <h1 class="display-4 mb-3" style="font-family: 'Arial', sans-serif;">Karibu kwenye Siri Yangu - Mahali pa kusimuliana Hadithi</h1>
                <h4 class="lead mb-3" style="font-family: 'Times New Roman', serif;">Pata hadithi za mapenzi, maisha, familia, ndoto na zaidi kutoka kwa watu kama wewe</h4>

                    <a href="/login">
                        <button type="submit" class="btn btn-success mb-3">
                            <i class="bi bi-box-arrow-right"></i> Sign In
                        </button>
                    </a>

            </div>
        </div>
    </body>
</html>






