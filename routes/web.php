<?php

Route::get('/', 'AnimeController@index');
Route::get('/anime/{animeId}', 'AnimeController@show');

Route::post('/anime/{animeId}', 'AnimeController@score');
