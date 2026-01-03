@extends('layouts.admin')

@section('title', 'Nieuwe FAQ-categorie aanmaken')

@section('content')
    <form action="{{ route('admin.faq-categories.store') }}" method="POST">
        @csrf
        <label for="name">Naam van de categorie: </label>
        <input type="text" id="name" name="name">

        <button type="submit" class="btn btn-edit">Categorie aanmaken</button>

    </form>
@endsection
