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
        Schema::create('albums_singers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('singer_id')->nullable();
            $table->index('singer_id', 'album_singer_idx');
            $table->foreign('singer_id')->on('singers')->references('id');
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
        Schema::dropIfExists('album_singers');
    }
};
