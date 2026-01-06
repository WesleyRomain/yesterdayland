@extends('layouts.admin')

@section('title', 'Nieuwe FAQ-vraag aanmaken')

@section('content')
    <h1> Nieuwe Faq-vraag</h1>
    <form action="{{ route('admin.faq-questions.store') }}" method="POST">
        @csrf

        <label for="question">Vraag:</label>
        <input type="text" id="question" name="question"><br>

        <label for="answer">Antwoord:</label>
        <textarea id="answer" name="answer"></textarea><br>

        <label>Categorieën:</label><br>
        @foreach($categories as $category)
            <label>
                <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                {{ $category->name }}
            </label><br>
        @endforeach

        <button type="submit" class="btn btn-edit">Vraag Opslaan</button>
    </form>
@endsection
