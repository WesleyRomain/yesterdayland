@extends('layouts.admin')

@section('title', 'Nieuwsitem bewerken')

@section('content')
<form action={{ route('admin.news.update', $news) }} method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="title">Titel nieuwsitem: </label>
    <input type="text" id="title" name="title" value="{{ old('title', $news->title) }}"><br>

    <label for="image">Afbeelding bij nieuwsartikel: </label>
    <input type="file" id="image" name="image"><br>

    <label for="content">Inhoud van het nieuwsfeit: </label>
    <textarea name="content" id="content" > {{ old('content', $news->content) }}</textarea><br>

    <label for="published_at">Datum van publicatie: </label>
    <input type="date" id="published_at" name="published_at" value=" {{ old('published_at',$news->published_at) }}">

    <button type="submit" class="btn btn-edit">Nieuws opslaan</button><br>
</form>
@endsection
