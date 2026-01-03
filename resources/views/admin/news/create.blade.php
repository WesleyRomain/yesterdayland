@extends('layouts.admin')

@section('title', 'Nieuwsitem aanmaken')

@section('content')
<form action="{{route('admin.news.store')}} " method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Titel nieuwsitem: </label>
    <input type="text" id="title" name="title"><br>

    <label for="image">Afbeelding bij nieuwsartikel: </label>
    <input type="file" id="image" name="image"><br>

    <label for="content">Inhoud van het nieuwsfeit: </label>
    <textarea name="content" id="content" ></textarea><br>

    <label for="published_at">Datum van publicatie: </label>
    <input type="date" id="published_at" name="published_at"><br>

    <button type="submit" class="btn btn-edit">Nieuws opslaan</button>
</form>
@endsection

