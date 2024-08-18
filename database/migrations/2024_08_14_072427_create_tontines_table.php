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
        Schema::create('tontines', function (Blueprint $table) {
            $table->id();
            $table->string('name_tontine')->unique();
            $table->unsignedBigInteger('cycle_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->json('order_of_passage')->nullable();
            $table->float('amount_tontine');
            $table->foreign('cycle_id')->references('id')->on('cycles');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tontines');
    }
};
