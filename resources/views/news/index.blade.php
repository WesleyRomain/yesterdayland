@extends('layouts.app') {{--Gebruikt ook de eenvoudige layout.--}}

@section('title', 'Nieuws van Yesterdayland')

@section('content')
    <h1>Nieuws van yesterdayland</h1>

    <div class="news-grid"> {{--Nieuwe klasse news-grid aanmaken voor aparte CSS.--}}
        @foreach($news as $new)
            <div class="news-item"> {{--Items van de grid hebben ook een aparte CSS.--}}
                <h2>
                    <a href="{{ route('news.show', $new) }}">
                        {{ $new->title }}
                    </a>
                </h2>

                @if($new->image)
                    <img src="{{asset('storage/' . $new->image)}}" alt="Nieuws afbeelding">
                @endif

                <p class="date"> {{--Moet nog omgezet worden naar NL...--}}
                    Gepubliceerd op: {{ \Carbon\Carbon::parse($new->published_at)->translatedFormat('d F Y') }}
                </p>

                <p>
                    {{ Str::limit($new->content, 150) }} {{--Limiteer de content op de overzichts-nieuwspagina tot 150.--}}
                </p>

                <a href="{{route('news.show', $new) }}" class="read-more"> {{--Redirecten naar de detailpagina.--}}
                    Lees meer ->
                </a>

            </div>

        @endforeach
    </div>
@endsection
