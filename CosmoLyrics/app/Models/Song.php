<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $table = 'songs';
    protected $guarded = false;

    public function singers()
    {
        return $this->belongsToMany(Singer::class, 'singer_songs', 'song_id', 'singer_id');
    }

   public function albums()
   {
       return $this->belongsToMany(Album::class, 'albums_songs', 'song_id', 'album_id');
   }

    public function genres()
    {
        return $this->hasMany(Genre::class, 'id', 'genre_id');
   }
}
