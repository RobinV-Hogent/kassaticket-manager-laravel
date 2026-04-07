@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif


    <form method="GET" action="{{ route('kassaticket.admin') }}">
        <div class="row g-3">
            <div class="col">
                <input type="text" class="form-control" placeholder="Naam" name="name" value="{{ request('name') }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Email" name="email"
                    value="{{ request('email') }}">
            </div>
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Zoeken">
    </form>
    <br>

    <table class="table table-hover rounded-md overflow-hidden">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Klant</th>
                <th scope="col">Email</th>
                <th scope="col">Bestand</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $ticket)
                <form method="POST" action="{{ route('kassaticket.modify', ['id' => $ticket->id]) }}">
                    @csrf
                    @method('PUT')
                    <tr>
                        <td class="place-items-center align-middle text-center">{{ $index + 1 }}</td>
                        <td class="align-middle">
                            <div class="align-middle">
                                <input type="text" class="form-control" name="klant[{{ $ticket->id }}]"
                                    placeholder="Uw naam" value="{{ old('klant.' . $ticket->id, $ticket->klant) }}">

                                @error("klant.$ticket->id")
                                    <div style="color:red">{{ $message }}</div>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <div class="align-middle">
                                <input type="text" class="form-control" name="email[{{ $ticket->id }}]"
                                    placeholder="Uw naam" value="{{ old('email.' . $ticket->id, $ticket->email) }}">

                                @error("email.$ticket->id")
                                    <div style="color:red">{{ $message }}</div>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('ticket.view', $ticket->id) }}" target="_blank" class="btn btn-link">
                                open file
                            </a>
                        </td>
                        <td><button class="btn btn-success" type="submit">Opslaan</button></td>
                    </tr>
                </form>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $data->links() }}
    </div>
@endsection
