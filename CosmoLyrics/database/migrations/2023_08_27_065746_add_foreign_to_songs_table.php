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
        Schema::table('songs', function (Blueprint $table) {
            $table->unsignedBigInteger('genre_id')->nullable();
            $table->index('genre_id', 'song_genres_idx');
            $table->foreign('genre_id', 'song_genres_fk')->on('genres')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->dropColumn('genre_id');
            $table->dropIndex('song_genres_idx');
            $table->dropForeign('song_genres_fk');
        });
    }
};
