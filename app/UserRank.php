<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRank extends Model
{
    protected $table = 'user_rank';

    public function getUserRank(int $userId)
    {
        return $this->where('user_id', $userId)
                    ->join('animes', 'user_rank.anime_id', '=', 'animes.id')
                    ->orderBy('rank')
                    ->get();
    }
}
