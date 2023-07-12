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
        Schema::table('posts', function (Blueprint $table) {

            $table->string('title',100)->nullable(false);
            $table->string('description',1000)->nullable(false);
            $table->unsignedInteger('nalanda_user_id')->nullable(false);
            $table->foreign('nalanda_user_id')->references('id')->on('nalanda_users');

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
