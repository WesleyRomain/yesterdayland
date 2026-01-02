<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->get(); // Nieuwe variabele $news: haal alle data op van tabel News en sorteer op nieuw-> oud.
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // Als functie wordt opgeroepen, stuur door naar admin.news.create
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Een nieuw nieuwsitem opslaan: eerst valideren of alle gegevens aanwezig zijn
    {
        $validated= $request->validate([
            'title' => 'required',
            'content' => 'required',
            'published_at' => 'required|date',
        ]);

        News::create($validated); // Een nieuwe instantie van News aanmaken.

        return redirect()->route('news.index'); // Stuur terug door naar de beginpagina.
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news) // Tonen van specifieke detailpagina.
    {
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news) // Bij aanroepen functie -> stuur door naar view: admin.news.edit .
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news) // Bij aanroepen functie: valideer gegevens en update het newsitem als alles oké is.
    {
        $validated= $request->validate([
            'title' => 'required',
            'content' => 'required',
            'published_at' => 'required|date',
        ]);

        $news->update($validated);

        return redirect()->route('news.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news) // Verwijderen van item.
    {
        $news->delete();

        return redirect()->route('admin.news.index');
    }
}
