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
        // Toont het formulier aan de gebruiker
        return view('toevoeging_kassaticket');
    }

    // Admin route
    // De pagina waarop de data zichtbaar is
    // Je kan zoeken op de pagina aan de hand van de naam of email van de klant
    // De naam en email van de klant kunnen ook aangepast worden op deze pagina
    public function admin(Request $request)
    {
        $name = $request->input('name', '');
        $email = $request->input('email', '');

        $data = Kassaticket::where('klant', 'like', '%' . $name . '%')->where('email', 'like', '%' . $email . '%')->paginate(perPage: 10);
        return view('admin_dashboard', compact('data'));
    }

    // Deze methode wordt aangeroepen indien de admin een weiziging maakt op het admin paneel
    public function modify(ModifyKassaticketRequest $request, $id)
    {
        // Doe de validatie voor ModifyKassaticketRequest
        $request->validated();

        // Zoek naar het ticket
        $ticket = Kassaticket::findOrFail($id);

        // Wijzig de data en sla het op
        $ticket->update([
            "klant" => $request->klant[$id],
            "email" => $request->email[$id]
        ]);

        // Breng de gebruiker (admin) terug naar de correcte view en toon een melding
        return back()->with('success', 'Informatie werd aangepast');
    }

    public function store(StoreKassaticketRequest $request)
    {
        // Controleer of alle data correct werd ingevuld
        $data = $request->validated();

        // Sla het kassaticket op
        $path = $request->ticket_path->store('images');

        // Maak een nieuw Kassaticket aan die in de database zal opgeslagen worden
        Kassaticket::create([
            'klant' => $data['klant'],
            'email' => $data['email'],
            'ticket_path' => $path
        ]);

        // Breng de gebruiker terug naar de homepage waar die een melding zal ontvanging indien de methode correct werd uitgevoerd
        return redirect()->route('kassaticket.index')->with('success', 'Kassaticket aangemaakt!');
    }

    public function showFile($id)
    {
        $ticket = Kassaticket::findOrFail($id);
        $path = storage_path('app\\private\\' . $ticket->ticket_path);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }
}
