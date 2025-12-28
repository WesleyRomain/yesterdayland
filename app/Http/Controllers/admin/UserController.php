<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
   public function index(){ // Haal de data van alle gebruikers op.
       $users = User::all();
       return view('admin.users.index', compact('users'));
   }
}
