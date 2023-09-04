<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Singer;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MusicStatisticController extends Controller
{
    public function getMusicStats()
    {

        $genreListenCounts = DB::table('songs')
            ->join('genres', 'songs.genre_id', '=', 'genres.id')
            ->select('genres.name as genre', DB::raw('SUM(songs.watches) as total_listens'))
            ->groupBy('genres.name')
            ->orderBy('total_listens', 'DESC')
            ->take(5)
            ->get();

        $top_song = Song::query()
            ->select(['id', 'name', 'photo', 'watches'])
            ->with('singers:id,name')
            ->orderBy('watches', 'DESC')
            ->first();


        $singers = Singer::count();
        $songs = Song::count();
        $totalWatches = Song::sum('watches');

        return response()->json([
            'singer_count' => $singers,
            'song_count' => $songs,
            'total_watches' => $totalWatches,
            'genre_listen_counts' => $genreListenCounts,
            'top_song' => $top_song,
        ], 200);
    }

    public function getSongs()
    {

        $perPage = 15;

        $all_songs = Song::query()
            ->select(['id', 'name', 'photo', 'watches'])
            ->with('singers:id,name')
            ->paginate($perPage);

        return response()->json([
            'all_songs' => $all_songs
        ], 200);
    }
}
