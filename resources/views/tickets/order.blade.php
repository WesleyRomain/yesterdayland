@extends('layouts.app')

@section('title', 'Tickets bestellen')

@section('content')
    <h1>Tickets bestellen</h1>

    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf

        <label for="name">Naam</label>
        <input type="text" name="name" id="name" required>

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required>

        <label for="ticket_type">Ticket type</label>
        <select name="ticket_type" id="ticket_type" required>
            <option value="gewoon">Gewoon ticket</option>
            <option value="vip">VIP ticket</option>
        </select>

        <label for="quantity">Aantal</label>
        <input type="number" name="quantity" id="quantity" min="1" value="1" required>

        <button type="submit">Bestellen</button>

    </form>
@endsection

