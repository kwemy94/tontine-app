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
            // Supprimer la clé étrangère cycle_id si elle existe dans la table tontines.
        if(Schema::hasTable('tontines')){
            Schema::table('tontines', function (Blueprint $table) {
                if(Schema::hasColumn('tontines', 'cycle_id')){
                    $table->dropForeign('cycle_id');
                }
            });
        }

        // Ajouter à nouveau la clé étrangère avec cascadeOnDelete
        Schema::table('tontines', function (Blueprint $table) {
            $table->foreign('cycle_id')->references('id')->on('cycles')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprimer la clé étrangère user_id avec cascadeOnDelete si nécessaire
        Schema::table('tontines', function (Blueprint $table) {
            $table->dropForeign('cycle_id');
        });

    }
};
