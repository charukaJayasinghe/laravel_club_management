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
        Schema::create('board_positions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("index");
            $table->string('name',50);
            $table->timestamps();
            $table->unsignedInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_positions');
    }
};
