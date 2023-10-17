<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MusicStatsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'singer_count' => $this->resource['singer_count'],
            'song_count' => $this->resource['song_count'],
            'total_watches' => $this->resource['total_watches'],
            'genre_listen_counts' => $this->resource['genre_listen_counts'],
            'top_song' => $this->resource['top_song'],
        ];
    }
}
