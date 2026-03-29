<?php

use App\Http\Controllers\KassaticketController;
use App\Http\Controllers\ProfileController;
use App\Models\Kassaticket;
use Illuminate\Support\Facades\Route;

Route::get('/', [KassaticketController::class, 'index'])->name('kassaticket.index');
Route::post('/', [KassaticketController::class, 'store'])->name('kassaticket.store');
Route::get('/admin-dashboard', [KassaticketController::class, 'admin'])->middleware(['auth'])->name('kassaticket.admin');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
