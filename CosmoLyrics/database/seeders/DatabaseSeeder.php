<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Album;
use App\Models\AlbumSinger;
use App\Models\AlbumSong;
use App\Models\Genre;
use App\Models\Singer;
use App\Models\SingerSong;
use App\Models\Song;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Genre::factory(20)->create();
        Singer::factory(15)->create();
        Song::factory(200)->create();
        SingerSong::factory(20)->create();
        Album::factory(15)->create();
        AlbumSong::factory(25)->create();
        AlbumSinger::factory(25)->create();
    }
}
