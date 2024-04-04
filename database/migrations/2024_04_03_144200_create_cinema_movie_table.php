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
        Schema::create('cinema_movie', function (Blueprint $table) {

            $table->unsignedBigInteger('cinema_id');
            $table->unsignedBigInteger('movie_id');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('cinema_id')->references('id')->on('cinema')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movie')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cinema_movie');
    }
};
