<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKassaticketRequest;
use App\Models\Kassaticket;
use Illuminate\Http\Request;

class KassaticketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('toevoeging_kassaticket');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKassaticketRequest $request)
    {
        $data = Kassaticket::create($request->validated());

        return redirect()->route('kassaticket.index')->with('success', 'Kassaticket aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kassaticket $kassaticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kassaticket $kassaticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kassaticket $kassaticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kassaticket $kassaticket)
    {
        //
    }
}
