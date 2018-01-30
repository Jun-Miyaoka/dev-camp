<?php

Route::get('/', 'AnimeController@index');
Route::post('/', 'AnimeController@search');

Route::get('/anime/{animeId}', 'AnimeController@show');
Route::post('/anime/{animeId}', 'AnimeController@score');
