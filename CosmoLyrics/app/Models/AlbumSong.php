<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumSong extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'albums_songs';
}
