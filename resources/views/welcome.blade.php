@extends('layouts.app') {{--Gebruik de standaard layout.--}}

@section('title', 'Home')

@section('content')
    <h1>Welkom bij Yesterdayland!</h1>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Alle bewoners</h2>
    <div class="profile-grid">
        @foreach($users as $user)
            <a href=" {{ route('profile.show', $user) }}"
               class="profile-item"> {{--Aangepast zodat mensen kunnen doorklikken naar de profielpagina'ss van de users--}}
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Foto van {{ $user->name }}">
                <p>{{ $user->name }}</p>
            </a>
        @endforeach
    </div>

    <h2>Tickets</h2>
    <div class="ticket-box">
        <h3 class="ticket-title">Yesterdayland 2026</h3>
        <a href="{{ route('tickets.order') }}" class="ticket-button">Bestel hier je tickets</a>
    </div>

@endsection
