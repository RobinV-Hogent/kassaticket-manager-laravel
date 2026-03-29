@extends('layouts.app')

@section('content')
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
            <form>
                <tr>
                    <td class="place-items-center align-middle text-center">{{ $index }}</td>
                    <td class="align-middle">
                        <div class="align-middle">
                            <input type="text" class="form-control" name="klant[{{ $index }}]" placeholder="Uw naam"
                                value="{{ old('klant.' . $index, $ticket->klant) }}">

                            @error("klant.$index")
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </td>
                    <td>
                        <div class="align-middle">
                            <input type="text" class="form-control" name="klant[{{ $index }}]" placeholder="Uw naam"
                                value="{{ old('email.' . $index, $ticket->email) }}">

                            @error("email.$index")
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </td>
                    <td><a href="">open file</a></td>
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
