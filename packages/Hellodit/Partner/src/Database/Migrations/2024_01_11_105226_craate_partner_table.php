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
        Schema::dropIfExists('partners');
        Schema::create('partners', function (Blueprint $table){
            $table->id();
            $table->string('image')->nullable();
            $table->string('language');
            $table->string('solution');
            $table->string('title');
            $table->string('last_name');
            $table->string('first_name');

            #communication
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('famille')->nullable();
            $table->string('email');
            $table->string('website');
            $table->text('description');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');

    }
};
