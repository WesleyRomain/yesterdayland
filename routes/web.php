<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    /*
     * Op alle routes uit deze groep wil ik de middleware toepassen.
     * Welke middleware? > auth en admin (zelf gemaakt).
     * Wat is mijn groep waarop ik de middleware wil toepassen? > /admin
     */
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    //Routes voor gebruiksbeheer
    Route::get('admin/users', [\App\Http\Controllers\admin\UserController::class, 'index'])->name('admin.users.index');
    //Als er naar admin/users wordt genavigeerd (deze route wordt geactiveerd als iemand er op klikt),
    //gebruik dan de UserController met functie index.

    Route::delete('admin/users/{user}', [\App\Http\Controllers\admin\UserController::class, 'destroy'])->name('admin.users.destroy');
    //Bij aanklikken verwijderbutton, navigeer naar route admin.users.destroy,
    //route spreekt UserController aan en voert destroy-functie uit.

});

require __DIR__ . '/auth.php';
