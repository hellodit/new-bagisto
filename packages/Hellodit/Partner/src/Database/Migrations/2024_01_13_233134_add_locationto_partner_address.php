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
        Schema::table('partner_addresses', function (Blueprint $table){
            $table->unsignedInteger('location_id')->nullable();
            $table->foreign('location_id')
                ->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partner_addresses', function (Blueprint $table){
            $table->dropColumn('location_id');
        });
    }
};
