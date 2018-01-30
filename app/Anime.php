<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Media;

class Anime extends Model
{
    protected $table = 'animes';

    public function media()
    {
        return $this->hasOne(Media::class);
    }

    public function getAnime(array $animeId)
    {
        $results = $this->whereIn('id', $animeId)
                        ->get()
                        ->toArray();

        foreach ($results as $result) {
            $animeName[] = $result['anime_name'];
        }

        return $animeName;
    }

    public function searchAnime(string $keyword)
    {
        return $this->where('anime_name', 'like', '%'.$keyword.'%')
                    ->get();
    }
}
