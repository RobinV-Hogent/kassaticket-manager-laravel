<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="">
    Kassaticket toevoegen

    <form action="{{ route('kassaticket.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="klant" class="form-label">Naam</label>
            <input type="text" class="form-control" id="klant" name="klant" placeholder="Uw naam" value="{{ old('klant') }}">
            @error('klant')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="naam@voorbeeld.com" value="{{ old('email') }}">
            @error('email')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ticket_path" class="form-label">Foto van uw kassaticket</label>
            <input class="form-control" type="file" id="ticket_path" name="ticket_path" value="{{ old('ticket_path') }}">
            @error('ticket_path')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>

</body>

</html>
