@extends('layouts.admin')

@section('title', 'gebruiksbeheer')

@section('content')
    <h1>Gebruiksbeheer</h1>

    <x-alert />

    <ul>
        @foreach($users as $user)
            <li>
                {{$user->name}} ({{$user->email}})
                <div class="user-actions">
                    <a href="{{route('admin.users.edit', $user)}}" class="btn btn-edit">Bewerken</a>
                    <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="inline-form">
                        @csrf {{--Beveiliging met unieke token--}}
                        @method('DELETE') {{--Methode = delete--}}
                        <button type="submit" class="btn btn-delete">Verwijderen
                        </button> {{--In loop gezet zodat alle gebruikers verwijderd kunnen worden en niet enkel de laatste.--}}
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <a href="{{route('admin.users.create')}}" class="btn btn-admin">Nieuwe gebruiker aanmaken</a>
@endsection
{{--
Link voor aanmaken nieuwe gebruiker.
Verwijst direct door naar de route admin.users.create.
Die route is gedefinieerd door in de UserController, de functie create aan te roepen.
--}}



