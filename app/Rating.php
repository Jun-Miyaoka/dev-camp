<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    protected $fillable = [
        'user_id',
        'anime_id',
        'rating',
    ];

    public function saveRate($userId, $animeId, $rate)
    {
        $params = ['user_id' => $userId, 'anime_id' => $animeId, 'rating' => $rate];

        $this->create($params);
    }
}
