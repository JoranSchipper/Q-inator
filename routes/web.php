<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Route::get('/test', function() {
	dump(Spotify::getTrack('2I24iuYNtqNuFD8XbNHu8Q'));
});

Route::get('/track/{id}', function($id) {

	$track = Spotify::getTrack($id);

	return view('track', ['track' => $track]);

});