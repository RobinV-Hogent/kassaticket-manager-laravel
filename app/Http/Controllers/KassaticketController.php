<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModifyKassaticketRequest;
use App\Http\Requests\StoreKassaticketRequest;
use App\Models\Kassaticket;
use Error;
use Exception;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Log\Logger;

class KassaticketController extends Controller
{

    public function index()
    {
        return view('toevoeging_kassaticket');
    }

    public function admin()
    {
        $data = Kassaticket::paginate(perPage: 10);

        return view('admin_dashboard', compact('data'));
    }

    public function modify(ModifyKassaticketRequest $request, $id)
    {
        $request->validated();
        $ticket = Kassaticket::findOrFail($id);

        $ticket->update([
            "klant" => $request->klant[$id],
            "email" => $request->email[$id]
        ]);

        return back()->with('success', 'Informatie werd aangepast');
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
