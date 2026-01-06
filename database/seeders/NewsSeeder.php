<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void // Seeder voor de eerste melding van yesterdayland: aankondiging over de ticketsale.
    {
        News::create([
            'user_id' => 1,
            'title' => 'Ticketsale start binnenkort!',
            'content' =>
                'Beste bewoners van Yesterdayland: het is weer zover!
             Ook dit jaar zal de jaarlijkse ticketsale van Yesterdayland in januari plaatsvinden.
             Dus zet je schrap en zit klaar voor je computer op 9 januari.
             Want iedereen weet: Yesterday is the new Tomorrow!',
            'image' => 'images/ticketsale.png',
            'published_at' => now(),
        ]);
    }
}
