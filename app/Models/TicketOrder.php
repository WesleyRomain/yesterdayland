<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketOrder extends Model
{
    protected $fillable = [
        'name',
        'email',
        'ticket_type',
        'quantity',
    ];
}
