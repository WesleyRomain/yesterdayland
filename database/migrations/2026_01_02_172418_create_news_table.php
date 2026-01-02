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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // In news tabel komt use_id kolom, daarin bewaar ik wie het item heeft aangemaakt. Constrained = verwijst naar user_id in tabel user(id) + als een admin verwijderd wordt -> verwijder dan automatisch alle items van hem/haar.
            $table->string('title'); // Nieuwsitems hebben minstens een titel, een afbeelding, content en publicatiedatum.
            $table->string('image')->nullable();
            $table->text('content');
            $table->date('published_at');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
