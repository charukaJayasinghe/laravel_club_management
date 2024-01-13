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
        Schema::create('news_comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('comment')->nullable(false);
            $table->unsignedInteger('nalanda_user_id')->nullable(false);
            $table->foreign('nalanda_user_id')->references('id')->on('nalanda_users');
            $table->unsignedBigInteger('news_id')->nullable(false);
            $table->foreign('news_id')->references('id')->on('news');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_comments');
    }
};
