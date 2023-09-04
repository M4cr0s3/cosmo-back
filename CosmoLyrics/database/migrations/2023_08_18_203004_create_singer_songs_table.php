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
        Schema::create('singer_songs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('singer_id');
            $table->unsignedBigInteger('song_id');
            $table->index('singer_id', 'singer_song_idx');
            $table->index('song_id', 'song_singer_idx');
            $table->foreign('singer_id')->on('singers')->references('id');
            $table->foreign('song_id')->on('songs')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('singer_songs');
    }
};
