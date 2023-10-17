<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MusicStatsResource;
use App\Http\Resources\SongCollection;
use App\Http\Resources\SongResource;
use App\Models\Singer;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MusicStatisticController extends Controller
{
    public function getMusicStats()
    {
        return new MusicStatsResource([
            'singer_count' => Singer::query()->count(),
            'song_count' => Song::query()->count(),
            'total_watches' => Song::query()->sum('watches'),
            'genre_listen_counts' => DB::table('songs')
                ->join('genres', 'songs.genre_id', '=', 'genres.id')
                ->select('genres.name as genre', DB::raw('SUM(songs.watches) as total_listens'))
                ->groupBy('genres.name')
                ->orderBy('total_listens', 'DESC')
                ->take(5)
                ->get(),
            'top_song' => Song::query()
                ->select(['id', 'name', 'photo', 'watches'])
                ->with('singers:id,name')
                ->orderBy('watches', 'DESC')
                ->first()
        ]);
    }

    public function getSongs()
    {

        $perPage = 15;

        return new SongCollection(Song::query()
            ->select(['id', 'name', 'photo', 'watches'])
            ->with('singers:id,name')
            ->paginate($perPage)
        );
    }
}
