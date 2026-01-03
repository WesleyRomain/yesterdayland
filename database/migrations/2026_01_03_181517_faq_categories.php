<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('faq_categories', function (Blueprint $table) { // Voor tabel op te bouwen.
            $table->id();
            $table->string('name'); // Een categorie heeft een naam bijvoorbeeld: Bestelling.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // Voor tabel af te breken...
    {
        Schema::dropIfExists('faq_categories');
    }
};
