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
        Schema::create('movie', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('cast');
            $table->string('director');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('image');
            $table->unsignedBigInteger('cinema_id');
            $table->foreign('cinema_id')->references('id')->on('cinema');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie');
    }
};
