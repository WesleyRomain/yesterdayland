@extends('layouts.admin')

@section('title', 'FAQ-Categorieën')

@section('content')
    <h1>FAQ-Categorieën</h1>

    @if(session('success'))
        <div style="color:green;">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div style="color:red;">{{ session('error') }}</div>
    @endif

    <ul>
        @foreach($categories as $category)
            <li>
                {{ $category->name }}
                <div class="user-actions">
                    <a href="{{ route('admin.faq-categories.edit', $category) }}" class="btn btn-edit">
                        Bewerken
                    </a>

                    <form action="{{ route('admin.faq-categories.destroy', $category) }}" method="POST">
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
@endsection

