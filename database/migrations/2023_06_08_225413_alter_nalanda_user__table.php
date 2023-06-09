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
        Schema::table('nalanda_users', function (Blueprint $table) {
            $table->String('full_name')->nullable(false)->change();
            $table->String('email')->nullable(false)->change();
            $table->String('mobile')->nullable(false)->change();
            $table->String('password')->nullable(false)->change();


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
