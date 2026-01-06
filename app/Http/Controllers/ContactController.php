<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;


class ContactController extends Controller
{
    // Toont contactpagina met formulier
    public function show()
    {
        return view('contact'); // Laadt resources/view/contact.blade.php
    }

    // Verwerkt het formulier en stuurt een email
    public function send(Request $request)
    {
        // 1. Validatie input gegevens
        $validated = $request->validate([
            'name' => 'required', // Naam is verplicht
            'email' => 'required|email', // Email is verplicht en moet geldig zijn
            'message' => 'required|min:10', // Bericht is verplicht en moet minimaal 10 tekens bevatten
        ]);

        // 2. Stuur een mail naar de admin met de ingevulde data.
        Mail::to('admin@ehb.be')->send(new ContactMessage($validated)); // To: Ontvanger van de mail + maak nieuwe contactmessage met gevalideerde data

        // 3. Stuur de gebruiker terug naar de contactpagina met een succesbericht
        return redirect()
            ->route('contact.show') // Redirect naar de GET-route /contact
            ->with('success', 'Je bericht is succesvol verzonden!'); // Bericht getoond op formulierpagina
    }

}
