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
        Schema::create('nalanda_users', function (Blueprint $table) {
            $table->increments('id');
            $table->String('full_name');
            $table->String('email');
            $table->String('mobile');
            $table->String('password');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nalanda_users');
    }
};
