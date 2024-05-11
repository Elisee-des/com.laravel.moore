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
        Schema::create('motmoorepluriels', function (Blueprint $table) {
            $table->id();
            $table->string('mot_en_fr');
            $table->string('mot_en_moore');
            $table->string('suffixe')->nullable();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('exemple')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motmoorepluriels');
    }
};
