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
        Schema::table('users', function (Blueprint $table) {
            // Modify the existing column to set default to 'Operator'
            $table->enum('user_type', ['Admin', 'Operator'])
                  ->default('Operator')
                  ->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Revert the default if needed
            $table->enum('user_type', ['Admin', 'Operator'])
                  ->nullable()
                  ->default(null)
                  ->change();
        });
    }
};
