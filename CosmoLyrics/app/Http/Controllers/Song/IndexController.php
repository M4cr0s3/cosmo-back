<?php

namespace App\Http\Controllers\Song;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $perPage = 10;

        $first100Ids = Song::query()
            ->orderBy('watches', 'DESC')
            ->take(100)
            ->get(['id']);

        $songs = Song::query()
            ->with(['singers:id,name'])
            ->whereIn('id', $first100Ids)
            ->orderBy('watches', 'DESC')
            ->select(['id', 'name', 'photo', 'watches'])
            ->paginate($perPage);

        return response()->json([
            'songs' => $songs,
        ]);
    }

    public function showSong($id)
    {
        $song = Song::with(['singers', 'albums'])->find($id);

        return response()->json([
            'song' => $song,
        ], 200);
    }
}
