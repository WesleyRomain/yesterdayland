<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

/*
 * We maken een AdminSeeder aan.
 * Het is immers vereist volgens de opdracht dat we één default-admin hebben.
 * User is een eloquent-model, hierdoor kunnen we de methode create() aanroepen,
 * waardoor we eenvoudig een User kunnen aanmaken die admin is.
*/

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('Password!321'),
            'is_admin' => true,
        ]);
    }
}
