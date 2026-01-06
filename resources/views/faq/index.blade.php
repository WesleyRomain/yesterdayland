@extends('layouts.app')

@section('title', 'Veelgestelde vragen')

@section('content')
    <h1>Veelgestelde vragen</h1>

    {{--Admin functies--}}
    @if(auth()->check() && auth()->user()->is_admin)
        <div class="admin-tools" style="margin-bottom: 20px;">
            <a href="{{ route('admin.faq-categories.index') }}" class="btn btn-admin">
                Beheer categorieën
            </a>

            <a href=" {{ route('admin.faq-questions.index') }}" class="btn btn-admin">
                Beheer vragen
            </a>
        </div>
    @endif

    {{-- FAQ inhoud --}}
    @foreach($categories as $category)
        <h2>{{ $category->name }}</h2>

        @foreach($category->questions as $question)
            <details style="margin-bottom: 10px;">
                <summary>{{ $question->question }}</summary>
                <p>{{ $question->answer }}</p>
            </details>
        @endforeach
    @endforeach
@endsection
