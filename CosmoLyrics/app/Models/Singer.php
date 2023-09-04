<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    use HasFactory;

    protected $table = 'singers';
    protected $guarded = false;

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'singer_songs', 'singer_id', 'song_id');
    }

   public function albums()
   {
       return $this->belongsToMany(Album::class, 'albums_singers', 'singer_id', 'album_id');
   }
}
