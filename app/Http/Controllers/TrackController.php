<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Spotify;

class TrackController extends Controller
{
	public function single($id)
	{
		$track = Spotify::getTrack($id);

		return view('track', ['track' => $track]);
	}
}