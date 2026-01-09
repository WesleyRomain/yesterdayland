<?php

namespace App\Http\Controllers;

use App\Models\TicketOrder;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Ticket;

class TicketController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'ticket_type' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        TicketOrder::create($validated);

        return redirect('/')->with('success', 'Tickets succesvol besteld');
    }
}
