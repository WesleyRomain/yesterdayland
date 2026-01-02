@extends('layouts.app') {{--Gebruik de standaard layout.--}}

@section('title', 'Home')

@section('content')
    <h1>Welkom bij Yesterdayland</h1>

    <h2>Alle bewoners</h2>
    <div class="profile-grid">
        @foreach($users as $user)
            <div class="profile-item">
                <img src="{{ asset ('storage/' . $user->profile_picture) }}" alt="Foto van {{ $user->name }}">
                <p> {{ $user->name }}</p>
            </div>
        @endforeach
    </div>

@endsection
