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
        Schema::create('albums_songs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('song_id')->nullable();
            $table->index('song_id', 'album_song_idx');
            $table->foreign('song_id')->on('songs')->references('id');
            $table->unsignedBigInteger('album_id')->nullable();
            $table->index('album_id', 'album_album_idx');
            $table->foreign('album_id')->on('albums')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_songs');
    }
};
