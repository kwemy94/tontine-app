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
        Schema::create('user__tontines', function (Blueprint $table) {
            $table->id();
            // $table->unsignedByInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            // $table->unsignedByInteger('tontine_id');
            // $table->foreign('tontine_id')->references('id')->on('tontines')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('tontine_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user__tontines');
    }
};
