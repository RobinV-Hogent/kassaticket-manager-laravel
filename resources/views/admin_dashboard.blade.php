@extends('layouts.app')

@section('content')
    @foreach ($data as $ticket)
    <li>{{ $ticket->klant }}</li>
    @endforeach

    <div class="mt-4">
        {{ $data->links() }}
    </div>
@endsection
