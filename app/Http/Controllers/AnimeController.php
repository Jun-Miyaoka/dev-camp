<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;
use App\Rating;
use App\AnimeSimilarity;
use App\UserRank;

class AnimeController extends Controller
{

    protected $anime;
    protected $rating;
    protected $animeSimilarity;
    protected $userRank;

    public function __construct(
        Anime $anime,
        Rating $rating,
        AnimeSimilarity $animeSimilarity,
        UserRank $userRank
        )
    {
        $this->anime           = $anime;
        $this->rating          = $rating;
        $this->animeSimilarity = $animeSimilarity;
        $this->userRank        = $userRank;
    }


    public function index()
    {
        $userId = 1;

        $rankedAnimes = $this->userRank->getUserRank($userId);

        return view('index', compact('rankedAnimes'));
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


    public function search(Request $request)
    {
        $keyword = $request->s;
        $searchedAnimes = $this->anime->searchAnime($keyword);

        return view('index', compact('searchedAnimes'));
    }
}
