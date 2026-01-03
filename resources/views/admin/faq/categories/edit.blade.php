@extends('layouts.admin')

@section('title', 'Bestaande FAQ-categorie wijzigen')

@section('content')
    <form action=" {{ route('admin.faq-categories.update', $faq_category->id)}} " method="POST">
        @csrf
        @method('PUT')
        <label for="name">Naam van de categorie: </label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">

        <button type="submit" class="btn btn-edit">Categorie bijwerken</button>
    </form>
@endsection
