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
        if(Schema::hasTable('tontine_users')){
            Schema::table('tontine_users', function (Blueprint $table) {
                if(Schema::hasColumn('tontine_users', 'user_id')){
                    $table->dropForeign(['user_id']);
                    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                }
                if(Schema::hasColumn('tontine_users', 'tontine_id')){
                    $table->dropForeign(['tontine_id']);
                    $table->foreign('tontine_id')->references('id')->on('tontines')->onDelete('cascade');
                }
            });
        }



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprimer la clé étrangère user_id avec cascadeOnDelete si nécessaire
        Schema::table('tontine_users', function (Blueprint $table) {
            # Restauration de la clé étrangère sans suppression en cascade
            if(Schema::hasColumn('tontine_users', 'user_id')){
                $table->dropForeign(['user_id']);
                $table->foreign('user_id')->references('id')->on('users');
            }
            if(Schema::hasColumn('tontine_users', 'tontine_id')){
                $table->dropForeign(['tontine_id']);
                $table->foreign('tontine_id')->references('id')->on('tontines');
            }
        });

    }
};
