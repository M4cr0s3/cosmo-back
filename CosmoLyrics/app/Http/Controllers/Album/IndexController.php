<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function showAlbum($id)
    {
        $album = Album::with(['songs', 'singers'])->find($id);

        return response()->json([
            'album' => $album
        ], 200);
    }
}
