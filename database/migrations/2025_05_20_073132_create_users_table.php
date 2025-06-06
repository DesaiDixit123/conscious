<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone_number')->unique();
        $table->string('address')->nullable();
        $table->string('password');
        $table->string('aadhaar_image')->nullable();
        $table->string('pan_card_image')->nullable();
        $table->enum('verification_status', ['Verified', 'Unverified'])->default('Unverified');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
