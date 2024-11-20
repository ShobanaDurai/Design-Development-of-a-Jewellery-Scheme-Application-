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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->string('map');
            $table->string('headquarters');
            $table->string('contact_number');
            $table->string('email');
            $table->time('monday_friday_open');
            $table->time('monday_friday_close');
            $table->time('weekend_open')->nullable();
            $table->time('weekend_close')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
        
    }
};
