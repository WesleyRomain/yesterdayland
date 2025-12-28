<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use function Laravel\Prompts\password;

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

   public function create(){
       return view('admin.users.create'); // Doorgestuurd naar form.
   }

   // 1. Store-functie ontvangt request van post formulier.
   public function store(Request $request){
       $request->validate([ // 2. Ik valideer eerst de gegevens.
           'name' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:8|',
           'is_admin' => 'nullable|boolean',
       ]);

       User::create([ // 3. Als de gegevens zijn gevalideerd, dan maken we een nieuwe user aan.
           'name' => $request->name,
           'email' => $request->email,
           'password' => bcrypt($request->password),
           'is_admin' => $request->boolean('is_admin'),
       ]);

       // 4. De admin wordt teruggestuurd naar zijn dashboard en krijgt een 'succes' boodschap te zien (al gedefinieerd in index)

       return redirect()->route('admin.users.index')->with('success', 'Je gebruiker is aangemaakt');
   }
   /*
    * Functie edit van de UserController zal direct de view teruggeven van het bewerkingsformulier
    */
   public function edit(User $user){
       return view('admin.users.edit', compact('user'));
   }

   public function update(Request $request, User $user){
       $request->validate([
           'name' => 'required',
           'email' => 'required|email',
           'is_admin' => 'nullable|boolean',
       ]);

       $user->update([
           'name'=>$request->name,
           'email'=>$request->email,
           'is_admin'=>$request->boolean('is_admin'),
       ]);

       return redirect()->route('admin.users.index')->with('success', 'Je gebruiker is aangepast');
   }
}
