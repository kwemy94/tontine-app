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
        if(schema::hasTable('tontines')){
            Schema::table('tontines', function (Blueprint $table) {
                if (!Schema::hasColumn('tontines', 'member_of_beneficiary')) {
                    $table->unsignedInteger('member_of_beneficiary')->nullable()->default('1');
                }
            });

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

            if(schema::hasTable('tontines')){
            Schema::table('tontines', function (Blueprint $table) {
                if (Schema::hasColumn('tontines', 'member_of_beneficiary')) {
                    $table->dropColumn('member_of_beneficiary');
                }
            });

        }

    }
};
