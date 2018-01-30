<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;
use App\Rating;
use App\AnimeSimilarity;

class AnimeController extends Controller
{

    protected $anime;
    protected $rating;
    protected $animeSimilarity;


    public function __construct(
        Anime $anime,
        Rating $rating,
        AnimeSimilarity $animeSimilarity
        )
    {
        $this->anime           = $anime;
        $this->rating          = $rating;
        $this->animeSimilarity = $animeSimilarity;
    }


    public function index()
    {
        $animes = $this->anime->all();

        return view('index', compact('animes'));
    }


    public function show($animeId)
    {
        $relatedAnimeId = $this->animeSimilarity->getRelatedAnimeId($animeId);
        $relatedAnimeNames = $this->anime->getAnime($relatedAnimeId);

        return view('show', compact('animeId', 'relatedAnimeNames'));
    }


    public function score(Request $request, int $animeId)
    {
        $rate   = $request->rating;
        $userId = 1;

        $this->rating->saveRate($userId, $animeId, $rate);

        return redirect()->action("AnimeController@index");
    }
}
