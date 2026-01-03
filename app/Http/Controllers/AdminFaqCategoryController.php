<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;

class AdminFaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = FaqCategory::all();
        return view('admin.faq.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faq.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required|unique:faq_categories|min:2|max:255',
        ]);

        FaqCategory::create($validated);
        return redirect()
            ->route('admin.faq-categories.index')
            ->with('success', 'Faq categorie succesvol toegevoegd');
    }

    /**
     * Show the form for editing the specified resource.
     */
        public function edit(FaqCategory $faq_category)
    {
        return view('admin.faq.categories.edit', compact('faq_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FaqCategory $faq_category)
    {
        $validated= $request->validate([
            'name' => 'required|min:2|max:255|unique:faq_categories,name,' . $faq_category->id,
        ]);

        $faq_category->update($validated);

        return redirect()
            ->route('admin.faq-categories.index')
            ->with('success', 'Faq categorie succesvol aangepast');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FaqCategory $faq_category)
    {
        $faq_category->delete();

        return redirect()
            ->route('admin.faq-categories.index')
            ->with('success', 'Faq categorie succesvol verwijderd');
    }
}
