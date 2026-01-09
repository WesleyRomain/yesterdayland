<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MascotteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'name' => 'Yori de Tijdrotter',
            'username' => 'yoridetijdrotter',
            'email' => 'mascotte@yesterdayland.be',
            'password' => Hash::make('IkbenYoridetijdrotter'),
            'is_admin' => false,
            'birthday' => '2000-01-01',
            'about_me' => 'Ik ben Yori, de officiële mascotte van Yesterdayland!',
            'profile_picture' => "images/YoriDeTijdRotter.png"
        ]);
    }
}
