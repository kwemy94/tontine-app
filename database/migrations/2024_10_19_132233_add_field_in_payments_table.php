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
        if(Schema::hasTable('payments')){
            Schema::table('payments', function (Blueprint $table) {
                if(!Schema::hasColumn('payments', 'status')){
                    $table->string('status', 20)->after('phone_number')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if(Schema::hasTable('payments')){
            Schema::table('payments', function (Blueprint $table) {
                if(Schema::hasColumn('payments', 'status')){
                    $table->dropColumn('status');
                }
            });
        }
    }
};
