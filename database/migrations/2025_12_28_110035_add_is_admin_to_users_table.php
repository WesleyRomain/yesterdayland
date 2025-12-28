<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /*
         * Ik wil de user tabel aanvullen met een nieuwe kolom is_admin bij initialisatie.
         * Hierdoor weet ik of iemand een admin is ja/nee.
         * Default staat de waarde in de tabel op 0 (=false).
        */
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /*
        * Ook de omgekeerde functie moet aangemaakt worden.
        */
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
    }
};
