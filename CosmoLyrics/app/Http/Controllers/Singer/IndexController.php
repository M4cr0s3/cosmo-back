<?php

namespace App\Http\Controllers\Singer;

use App\Http\Controllers\Controller;
use App\Models\Singer;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function showSinger($id)
    {
        $singer = Singer::with(['songs', 'albums'])->find($id);

        return response()->json([
            'singer' => $singer,
        ]);
    }
}
