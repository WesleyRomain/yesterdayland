<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use App\Models\FaqQuestion;

class FaqQuestionsSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Categorieën aanmaken
        $tickets = FaqCategory::firstOrCreate(['name' => 'Tickets']);
        $praktisch = FaqCategory::firstOrCreate(['name' => 'Praktisch']);
        $betaling = FaqCategory::firstOrCreate(['name' => 'Betaling']);
        $toegankelijkheid = FaqCategory::firstOrCreate(['name' => 'Toegankelijkheid']);

        // 2. Vragen aanmaken + koppelen

        // Tickets
        FaqQuestion::create([
            'question' => 'Wanneer start de ticketsale?',
            'answer' => 'De ticketsale start op 9 januari. Nog eventjes wachten.',
        ])->categories()->attach($tickets->id);

        FaqQuestion::create([
            'question' => 'Kan ik mijn ticket annuleren?',
            'answer' => 'Tickets kunnen niet worden geannuleerd, tenzij het evenement wordt afgelast.',
        ])->categories()->attach($tickets->id);

        // Praktisch
        FaqQuestion::create([
            'question' => 'Mag ik eten en drinken meenemen?',
            'answer' => 'Eigen eten en drinken is niet toegestaan. Er zijn voldoende eetstanden aanwezig.',
        ])->categories()->attach($praktisch->id);

        FaqQuestion::create([
            'question' => 'Vanaf hoe laat gaan de deuren open?',
            'answer' => 'De deuren openen twee uur voor aanvang van het evenement.',
        ])->categories()->attach($praktisch->id);

        // Betaling
        FaqQuestion::create([
            'question' => 'Welke betaalmethodes worden aanvaard?',
            'answer' => 'Je kan betalen met Bancontact, kredietkaart en PayPal.',
        ])->categories()->attach($betaling->id);

        // Toegankelijkheid
        FaqQuestion::create([
            'question' => 'Is het evenement toegankelijk voor rolstoelen?',
            'answer' => 'Ja, er zijn speciale zones voorzien voor rolstoelgebruikers.',
        ])->categories()->attach($toegankelijkheid->id);
    }
}

