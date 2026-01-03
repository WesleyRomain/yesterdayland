@extends('layouts.admin')

@section('title', 'Gebruiker aanmaken')

@section('content')
    <h1>Nieuwe gebruiker aanmaken</h1>

    @if($errors->any())
        <div style="color:red;">
            <ul style="list-style-type: none">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{--De form zal gepost worden naar de store-method.--}}
    <form action="{{route('admin.users.store')}}" method="POST">
        @csrf
        <label for="naam">Naam: </label>
        <input type="text" id="naam" name="name"><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email"><br>

        <label for="wachtwoord">Wachtwoord: </label>
        <input type="password" id="wachtwoord" name="password"><br>

        <label for="admin">Wil je van de gebruiker een admin. maken? </label>
        <input type="checkbox" id="admin" name="is_admin" value="1"><br>
        {{--Belangrijk om hier een waarde mee te geven (gaf fout in test: "on")--}}

        <button type="submit" class="btn btn-admin">Nieuwe gebruiker aanmaken</button>

    </form>
@endsection
