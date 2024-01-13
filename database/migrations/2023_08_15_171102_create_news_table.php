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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title',100)->nullable(false);
            $table->longText('description')->nullable(false);
            $table->unsignedInteger('admin_id')->nullable(false);
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->smallInteger('delete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
