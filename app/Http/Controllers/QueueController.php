<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use Spotify;
use Illuminate\Routing\Controller;

class QueueController extends Controller
{
	public function index()
	{
		$user = Spotify::getUser();

		$queue = Queue::where('host', '=', $user->id)->first();

		if (!$queue) {
			$playlist = Spotify::createPlaylist($user->id, "Q-inator");

			$queue = new Queue;
			$queue->host = $user->id;
			$queue->playlist = $playlist->id;
			$queue->store;
			$queue->save();
		} else {
			$playlist = Spotify::getPlaylist($user->id, $queue->playlist);
		}

		dump($playlist);
		dump($queue);
	}

	public function addTrack($track_id)
	{
		$user = Spotify::getUser();
		$queue = Queue::where('host', '=', $user->id)->first();

		if ($queue) {
			Spotify::addTracksToPlaylist($user->id, $queue->playlist, [$track_id]);
		}
	}
}