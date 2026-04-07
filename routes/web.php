<?php

use App\Http\Controllers\KassaticketController;
use App\Http\Controllers\ProfileController;
use App\Http\Requests\ModifyKassaticketRequest;
use App\Models\Kassaticket;
use Illuminate\Support\Facades\Route;

// GET '/': Brengt de user naar de homepage waar het forulier terug te vinden is
Route::get('/', [KassaticketController::class, 'index'])->name('kassaticket.index');

// POST '/' Deze endpoint wordt aangeroepen als de user het formulier doorstuurt
Route::post('/', [KassaticketController::class, 'store'])->name('kassaticket.store');

// PUT: 'kassaticket/{id}' Deze endpoint is gemaakt voor de admin, en zorgt voor de aanpassing van een kassaticket (naam of email van een klant)
Route::put('kassaticket/{id}', [KassaticketController::class, 'modify'])->name('kassaticket.modify');

// GET '/admin-dashboard' Deze endpoint geeft de admin een overview van alle ingezende kassatickets
Route::get('/admin-dashboard', [KassaticketController::class, 'admin'])->middleware(['auth'])->name('kassaticket.admin');

// Extra routes in verband met authenticatie
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
