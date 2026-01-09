<?php

namespace App\Http\Controllers;

use App\Models\TicketOrder;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Ticket;

class AdminTicketController extends Controller
{
    public function index()
    {
        $orders = TicketOrder::latest()->get();
        return view('admin.tickets.index', compact('orders'));
    }
}
