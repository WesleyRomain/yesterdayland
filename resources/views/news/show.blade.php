@extends('layouts.app')

@section('title', $news->title)

@section('content')
    <h1>{{ $news->title }}</h1>

    @if($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" alt="Nieuws afbeelding">
    @endif

    <p class="date">
        Gepubliceerd op: {{ \Carbon\Carbon::parse($news->published_at)->translatedFormat('d F Y') }}
    </p>

    <div class="news-content">
        {!! nl2br(e($news->content)) !!}
    </div>

    <a href="{{ route('news.index') }}" class="back-link">
        <- Terug naar overzicht
    </a>
@endsection
