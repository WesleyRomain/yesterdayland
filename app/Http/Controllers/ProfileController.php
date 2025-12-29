<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    //Toont publieke profielpagina.
    public function show(User $user){
        return view('profile.show', compact('user'));
    }

    //Geeft het formulier om de profielpagina te bewerken.
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([ //Verifieer de doorgestuurde velden van $request.
            'username' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'about_me' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:2048',

        ]);

        $user= $request->user(); //Ophalen van de ingelogde gebruiker.

        $user->username=$request->username; //Nieuwe waarden in user-model steken.
        $user->birthday=$request->birthday;
        $user->about_me=$request->about_me;

        //Eventuele profielfoto toevoegen.
        if($request->hasFile('profile_picture')){
            $path=$request->file('profile_picture')->store('profile_pictures','public');
            $user->profile_picture=$path;
        }

        $user->save(); //Gebruiker opslaan in de database.

        //Terugsturen naar de profielpagina die gegevens toont.
        return Redirect::route('profile.show', $user)->with('success', 'Your profile has been updated.');
    }
    //Destroy + route verwijderd, niet nodig (gebruiker kan enkel "aanpassen").
}
