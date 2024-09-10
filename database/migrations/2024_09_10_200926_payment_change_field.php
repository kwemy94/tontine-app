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

        if(Schema::hasTable('payments'))
        {
            Schema::table('payments', function (Blueprint $table) {
            if(schema::hasColumn('payments', 'period'))
            {
                $table->string('period')->change();
            }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paiements', function (Blueprint $table) {
            //
        });
    }
};
