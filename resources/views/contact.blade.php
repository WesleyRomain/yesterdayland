@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <h1>Contact</h1>

    {{--Succesbericht na verzenden--}}
    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    {{--Validatiefouten tonen--}}
    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li> {{--Toon alle fouten--}}
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact.send') }}" method="POST"> {{-- Form stuurt naar de POST-route --}}
        @csrf

        <label for="name">Naam</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"> {{-- Hergebruik vorige invoer bij validatiefouten --}}

        <label for="email">E-mail</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"> {{--Hergebruik vorige invoer bij validatiefouten --}}

        <label for="message">Bericht</label>
        <textarea
            id="message"
            name="message"
        >{{ old('message') }}</textarea> {{--Hergebruik vorige invoer bij validatiefouten --}}

        <button type="submit" class="btn">Versturen</button> {{--Verstuurknop--}}
    </form>
@endsection
