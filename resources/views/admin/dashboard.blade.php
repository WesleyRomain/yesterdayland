@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')

    <h1>Admin Dashboard</h1>

    <p> Welkom {{auth()->user()->name}}</p>
    <p> Je bent succesvol ingelogd als admin. Wat wil je doen?</p>

    <div class="admin-links">
        <a href="{{ route('admin.users.index') }}" class="btn btn-admin">Gebruikers beheren</a> {{--Verbindt door naar route admin.users.index--}}
        <a href="{{ route('news.index')}}" class="btn btn-edit">Nieuws
            beheren </a> {{--Verbindt door naar route news.index--}}
        <a href="#" class="btn btn-edit">FAQ beheren</a>
        <a href="#" class="btn btn-edit">Contactberichten</a>
    </div>
@endsection
