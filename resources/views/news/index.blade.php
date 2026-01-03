@extends('layouts.app') {{--Gebruikt ook de eenvoudige layout.--}}

@section('title', 'Nieuws van Yesterdayland')

@section('content')
    <h1>Nieuws van Yesterdayland</h1>

    {{--Indien iemand admin is: voeg een link toe om een nieuw nieuwselement toe te voegen.--}}
    @auth
        @if(auth()->user()->is_admin)
            <a href=" {{ route('admin.news.create') }}" class="btn-admin">
                + Nieuw nieuwsitem aanmaken
            </a>
        @endif
    @endauth

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

                @auth  {{--Als iemand admin is= voeg dan volgende knoppen toe. Niet apart nog een admin view maken = dubbel werk!--}}
                    @if(auth()->user()->is_admin)
                        <div class="admin-buttons">
                            <a href=" {{ route('admin.news.edit', $new) }} " class="btn-edit">
                                Bewerken
                            </a>

                            <form action=" {{ route('admin.news.destroy', $new) }} " method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-delete">
                                    Verwijderen
                                </button>

                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>
@endsection
