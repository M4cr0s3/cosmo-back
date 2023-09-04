<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingerSong extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'singer_songs';

}
