<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'albums';

   public function songs()
   {
       return $this->belongsToMany(Song::class, 'albums_songs', 'album_id', 'song_id');
   }

   public function singers()
   {
       return $this->belongsToMany(Singer::class, 'albums_singers', 'album_id', 'singer_id');
   }
}
