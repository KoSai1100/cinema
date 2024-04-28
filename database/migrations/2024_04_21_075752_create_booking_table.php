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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('showtime_id');
            $table->string('seatnumber'); // Changed from seatnumber to seats
            $table->string('totalprice');
            $table->string('promocode');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user'); // Changed from user to users
            $table->foreign('showtime_id')->references('id')->on('showtimes'); // Adjust according to your actual table name
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
