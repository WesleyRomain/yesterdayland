@extends('layouts.app')

@section('title', 'Mijn profiel bewerken')

@section('content')
    <h1>Mijn profiel bewerken</h1>

    <form action="{{route('profile.update')}}" method="POST"
          enctype="multipart/form-data"> {{--Form wordt doorgestuurd naar profile.update voor verwerking--}}
        @csrf
        @method('PATCH')

        <label for="username">Gebruiksnaam: </label>
        <input type="text" id="username" name="username" value="{{old('username', $user->username)}}"><br>

        <label for="birthday">Geboortedatum (in Amerikaanse notatie): </label>
        <input type="date" id="birthday" name="birthday" value="{{old('birthday', $user->birthday)}}"><br>

        <label id="about_me">Over mij: </label>
        <textarea name="about_me" id="about_me">{{old('about_me', $user->about_me)}}</textarea><br>

        <label for="profilepicture">Voeg een profielfoto toe: </label>
        <input type="file" id="profilepicture" name="profile_picture"><br>

        @if($user->profile_picture)
            <img src="{{asset('storage/'. $user->profile_picture)}}" width="120"><br>
        @endif

        <button type="submit">Opslaan</button>
    </form>

@endsection
