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

   public function destroy(User $user){

       if(auth()->id() === $user->id){// Als de ingelogde gebruiker dezelfde is als de meegegeven user zijn id,
           return back()->with('error', 'Je kan jezelf niet verwijderen'); // ...dan ga je terug naar de beheerpagina.
           // De beheerpagina vangt de sessie op met een boodschap "je kan jezelf niet verwijderen".
       }

       $user->delete();

       //Voorlopig laatst toegevoegde verwijderen

       return back()->with('success', 'Je gebruiker is verwijderd');
   }
}
