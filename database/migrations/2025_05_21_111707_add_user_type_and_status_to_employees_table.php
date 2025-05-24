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
        Schema::table('employees', function (Blueprint $table) {
            $table->enum('user_type', ['Admin', 'Operator'])->default('Operator')->after('email'); // or any column
            $table->enum('user_status', ['Active', 'Inactive'])->default('Inactive')->after('user_type');
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn(['user_type', 'user_status']);
        });
    }
};
