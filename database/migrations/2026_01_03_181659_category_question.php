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
        Schema::create('category_question', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faq_category_id')->constrained()->onDelete('cascade');  // Maakt een kolom aan die verwijst naar categorie(id) van een andere tabel, als een categorie verwijderd wordt, verwijder dan alle gekoppelde records met vragen.
            $table->foreignId('faq_question_id')->constrained()->onDelete('cascade'); // Maakt een kolom aan die verwijst naar question(id) van een andere tabel, als een vraag verwijderd wordt, verwijder dan alle gekoppelde records met categorie.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_question');
    }
};
