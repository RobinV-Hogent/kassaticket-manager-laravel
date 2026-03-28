<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKassaticketRequest;
use App\Models\Kassaticket;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;

class KassaticketController extends Controller
{

    public function index()
    {
        return view('toevoeging_kassaticket');
    }

    public function store(StoreKassaticketRequest $request)
    {
        $data = $request->validated();

        $path = $request->ticket_path->store('images');

        Kassaticket::create([
            'klant' => $data['klant'],
            'email' => $data['email'],
            'ticket_path' => $path
        ]);

        return redirect()->route('kassaticket.index')->with('success', 'Kassaticket aangemaakt!');
    }

}
