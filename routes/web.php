<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User; // Gebruik van User-model.
Route::get('/', function () {
    $users = User::where('is_admin', false)->get(); // Gebruik het User-model en haal de lijst op van alle gebruikers die geen admin zijn.
    return view('welcome', compact('users')); // Toon de "Welcome"-view en geef $users hieraan mee.
});

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/news', [NewsController::class, 'index'])->name('news.index'); // Lijst van alle nieuwtjes.
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show'); //Detailpagina van een newsitem

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
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

    Route::get('admin/users/create', [\App\Http\Controllers\admin\UserController::class, 'create'])->name('admin.users.create');
    //Bij aanklikken link in view zal admin doorgestuurd worden naar de create form.
    Route::post('admin/users', [\App\Http\Controllers\admin\UserController::class, 'store'])->name('admin.users.store');

    //Als admin. op homepagina van gebruikersbeheer zit en klikt op bewerken (naast een user), spreek dan de Usercontroller aan ->f('edit').
    Route::get('admin/users/{user}/edit', [\App\Http\Controllers\admin\UserController::class, 'edit'])->name('admin.users.edit');
    //Route als formulier verzonden wordt: spreek UserController -> f('update') aan.
    Route::put('admin/users/{user}', [\App\Http\Controllers\admin\UserController::class, 'update'])->name('admin.users.update');

    Route::resource('admin/news', NewsController::class)->except(['show']);

});

require __DIR__ . '/auth.php';
