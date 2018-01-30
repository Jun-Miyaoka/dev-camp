<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Anime;

class Media extends Model
{
    protected $table = 'medias';

    protected $fillable = [
        'id',
        'media_name',
    ];

    public function anime()
    {
        $this->belongsTo(Anime::class);
    }
}
