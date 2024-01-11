<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('partner_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')
                ->references('id')
                ->on('partners');
            #address
            $table->string('street');
            $table->string('zip_code');
            $table->string('city');
            $table->string('country');
            $table->string('state');


            #communication
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('famille')->nullable();
            $table->string('email');
            $table->string('website');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
