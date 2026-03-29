{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="mx-5"> --}}

@extends('layouts.app')


    @section('content')
    <h1 class="text-center py-5 text-4xl font-extrabold">Voeg uw kassaticket toe!</h1>

    <div class="container justify-center">

        <div class="col col-lg-8 mx-lg-auto">
            <form action="{{ route('kassaticket.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="klant" class="form-label font-weight-bold">Naam</label>
                    <input type="text" class="form-control" id="klant" name="klant" placeholder="Uw naam"
                        value="{{ old('klant') }}">
                    @error('klant')
                        <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label font-weight-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="naam@voorbeeld.com" value="{{ old('email') }}">
                    @error('email')
                        <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ticket_path" class="form-label font-weight-bold">Foto van uw kassaticket</label>
                    <input class="form-control" type="file" id="ticket_path" name="ticket_path"
                        value="{{ old('ticket_path') }}">
                    @error('ticket_path')
                        <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <button class="btn btn-success" type="submit">Verstuur</button>
                </div>
            </form>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
    @endsection
{{-- </body>

</html> --}}
