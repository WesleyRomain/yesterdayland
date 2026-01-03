<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;

class AdminFaqQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = FaqQuestion::with('categories')->get();
        return view('admin.faq.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = FaqCategory::all();
        return view('admin.faq.questions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =$request->validate([
            'question' => 'required|min:3|max:255',
            'answer' => 'required|min:3',
            'categories' => 'required|array',
        ]);

        $question= FaqQuestion::create([
            'question' => $validated['question'],
            'answer' => $validated['answer'],
        ]);

        // Many-to-many koppeling
        $question->categories()->sync($validated['categories']);

        return redirect()
            ->route('admin.faq-questions.index')
            ->with('success', 'Faq vraag succesvol toegevoegd');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FaqQuestion $faq_question)
    {
        $categories = FaqCategory::all();
        $selected=$faq_question->categories->pluck('id')->toArray();

        return view('admin.faq.questions.edit', compact('faq_question', 'categories', 'selected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FaqQuestion $faq_question)
    {
        $validated =$request->validate([
            'question' => 'required|min:3|max:255',
            'answer' => 'required|min:3',
            'categories' => 'required|array',
        ]);

        $faq_question->update([
            'question' => $validated['question'],
            'answer' => $validated['answer'],
        ]);

        // Many to-many koppeling updaten
        $faq_question->categories()->sync($validated['categories']);
        return redirect()
            ->route('admin.faq-questions.index')
            ->with('success', 'Faq vraag succesvol bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FaqQuestion $faq_question)
    {
        $faq_question->categories()->detach();
        $faq_question->delete();

        return redirect()
            ->route('admin.faq-questions.index')
            ->with('success', 'Faq vraag succesvol verwijderd');
    }
}
