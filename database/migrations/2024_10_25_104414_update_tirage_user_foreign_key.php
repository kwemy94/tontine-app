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
        // Supprimer la clé étrangère user_id si elle existe dans la table tontine_users.
        if(Schema::hasTable('tirages')){
            Schema::table('tirages', function (Blueprint $table) {
                if(Schema::hasColumn('tirages', 'user_id')){
                    $table->dropForeign('user_id');
                }
            });
        }

        // Ajouter à nouveau la clé étrangère avec cascadeOnDelete
        Schema::table('tirages', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });


        // Supprimer la clé étrangère tontine_id si elle existe dans la table tontine_users.
        if(Schema::hasTable('tirages')){
            Schema::table('tirages', function (Blueprint $table) {
                if(Schema::hasColumn('tirages', 'tontine_id')){
                    $table->dropForeign('tontine_id');
                }
            });
        }

        // Ajouter à nouveau la clé étrangère avec cascadeOnDelete
        Schema::table('tirages', function (Blueprint $table) {
            $table->foreign('tontine_id')->references('id')->on('tontines')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprimer la clé étrangère user_id avec cascadeOnDelete si nécessaire
        Schema::table('tirages', function (Blueprint $table) {
            $table->dropForeign('user_id');
        });
        // Supprimer la clé étrangère avec cascadeOnDelete si nécessaire
        Schema::table('tirages', function (Blueprint $table) {
            $table->dropForeign('tontine_id');
        });
    }
};
