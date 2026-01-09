@extends('layouts.admin')

@section('title', 'Bestellingen')

@section('content')
    <h1>Alle ticketbestellingen</h1>

    <table class="admin-table">
        <tr>
            <th>Naam</th>
            <th>Email</th>
            <th>Ticket Type</th>
            <th>Aantal</th>
            <th>Datum</th>
        </tr>

        @foreach($orders as $order)
            <tr>
                <td>{{ $order->name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->ticket_type }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
            </tr>

        @endforeach
    </table>

@endsection


