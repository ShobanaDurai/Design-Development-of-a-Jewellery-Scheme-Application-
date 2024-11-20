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
        Schema::create('goldsavingsregistration', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('phone');
            $table->integer('otp')->nullable();
            $table->timestamp('otp_verified_at')->nullable();
            $table->string('email')->nullable();
            $table->string('address');
            $table->string('state');
            $table->integer('pincode');
            $table->string('country');
            $table->string('nominee');
            $table->string('aadhaar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goldsavingsregistration');
    }
};
