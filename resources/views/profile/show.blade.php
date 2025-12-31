@extends('layouts.app')

@section('title', 'Profiel van ' . ($user->username ?? $user->name))

@section('content')
    <h1>Profiel van: {{$user->username ?? $user->name}}</h1> {{--Idem vorige comment.--}}

    @if($user->profile_picture)
        {{--Als er een profielfoto aanwezig is, toon hem dan.--}}
        <img src="{{asset('storage/'. $user->profile_picture)}}"
             alt="Profielfoto"
             width="150">
    @endif

    <h2>Verjaardag</h2> {{--Verjaardag tonen--}}
    <p>{{$user->birthday ?? 'Niet ingevuld.'}}</p>

    <h2>Over mij</h2> {{--Over mij tonen--}}
    <p>{{$user->about_me ?? 'Geen informatie opgegeven.'}}</p>

@endsection

