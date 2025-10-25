@extends('layouts.app')

@section('button')
@endsection

@section('content')
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



@endsection