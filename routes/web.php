<?php

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AdminFaqCategoryController;
use App\Http\Controllers\AdminFaqQuestionController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

// Gebruik van User-model.

//Publieke homepage
Route::get('/', function () {
    $users = User::where('is_admin', false)->get(); // Gebruik het User-model en haal de lijst op van alle gebruikers die geen admin zijn.
    return view('welcome', compact('users')); // Toon de "Welcome"-view en geef $users hieraan mee.
});

//Publieke profielen
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

//Publieke nieuwssecties (overzicht + detail)
Route::get('/news', [NewsController::class, 'index'])->name('news.index'); // Lijst van alle nieuwtjes.
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show'); // Detailpagina van een nieuwsitem.

//Publieke route voor FAQ
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

//Ingelogde gebruikers (profiel bewerken)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth', 'admin']) // Alleen ingelogde admins mogen deze functionaliteiten hebben.
->prefix('admin') // Alle URL's beginnen met /admin --> bv /admin/users/5/edit
->name('admin.') // Alle routenamen beginnen met admin.
->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Gegroepeerde routes voor CRUD: news
    Route::resource('news', NewsController::class)->except(['show']);

    // Gegroepeerde routes voor CRUD: user
    Route::resource('users', UserController::class);

    // Gegroepeerde routes voor CRUD FAQ-categories
    Route::resource('faq-categories', AdminFaqCategoryController::class);

    // Gegroepeerde routes voor CRUD FAQ-questions
    Route::resource('faq-questions', AdminFaqQuestionController::class);
});

require __DIR__ . '/auth.php';

