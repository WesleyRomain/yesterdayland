@extends('layouts.admin')

@section('title', 'FAQQ-vraag bewerken')

@section('content')
    <h1>Faq-vraag bewerken</h1>

    <form action=" {{ route('admin.faq-questions.update', $faq_question) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="question">Vraag:</label>
        <input
            type="text"
            id="question"
            name="question"
            value="{{ old('question', $faq_question->question) }}"
        ><br>

        <label for="answer">Antwoord:</label>
        <textarea id="answer" name="answer">{{ old('answer', $faq_question->answer) }}</textarea><br>

        <label>Categorieën</label><br>
        @foreach($categories as $category)
            <label>
                <input
                    type="checkbox"
                    name="categories[]"
                    value="{{ $category->id }}"
                    @if(in_array($category->id, $selected)) checked @endif
                >
                {{ $category->name }}
            </label><br>
        @endforeach

        <button type="submit" class="btn btn-edit">Vraag bijwerken</button>
    </form>
@endsection
