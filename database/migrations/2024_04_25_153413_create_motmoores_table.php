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
        Schema::create('motmoores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            $table->foreignId('motmooresingulier_id')->references('id')->on('motmooresinguliers')->onDelete('cascade');
            $table->foreignId('motmoorepluriel_id')->references('id')->on('motmoorepluriels')->onDelete('cascade');
            $table->string('numero')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motmoores');
    }
};
