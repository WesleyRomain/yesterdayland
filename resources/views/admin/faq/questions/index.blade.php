@extends('layouts.admin')

@section('title', 'FAQ-vragen')

@section('content')
    <h1>FAQ-vragen</h1>

    <x-alert/>

    <ul>
        @foreach($questions as $question)
            <li>
                {{ $question->question }}

                <div class="user-actions">
                    <a href="{{ route('admin.faq-questions.edit',  $question) }}" class="btn btn-edit">
                        Bewerken
                    </a>

                    <form action="{{ route('admin.faq-questions.destroy', $question) }}" method="POST"
                          class="inline-form">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-delete">
                            Verwijderen
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <a href="{{ route ('admin.faq-questions.create') }}" class="btn btn-admin">
        Nieuwe vraag aanmaken
    </a><br>

    <a href="{{ route('faq.index') }}" class="btn ">
        Terug naar overzicht
    </a>

@endsection
