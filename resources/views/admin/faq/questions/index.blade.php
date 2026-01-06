@extends('layouts.admin')

@section('title', 'FAQ-vragen')

@section('content')
    <h1>FAQ-vragen</h1>

    @if(session('success'))
        <div style="color:green;">{{ session('succes') }}</div>
    @endif

    @if(session('error'))
        <div style="color:red;">{{ session ('error') }}</div>
    @endif

    <ul>
        @foreach($questions as $question)
            <li>
                {{ $question->question }}

                <div class="user-actions">
                    <a href="{{ route('admin.faq-questions.edit',  $question) }}" class="btn btn-edit">
                        Bewerken
                    </a>

                    <form action="{{ route('admin.faq-questions.destroy', $question) }}" method="POST">
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
    </a>

    <a href="{{ route('faq.index') }}" class="btn ">
        Terug naar overzicht
    </a>

@endsection
