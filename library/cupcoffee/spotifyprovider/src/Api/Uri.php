<?php

namespace CupCoffee\SpotifyProvider\Api;

class Uri
{
	/**
	 * Tracks
	 */
	const TRACK = "/tracks/%s";
	const TRACKS = "/tracks";

	/**
	 * Playlists
	 */
	const PLAYLIST = "/users/%s/playlists/%s";
	const PLAYLIST_TRACKS = "/users/%s/playlists/%s/tracks";
	const PLAYLIST_CREATE = "/users/%s/playlists";


	/**
	 * @param string $uri
	 * @param array ...$params
	 * @return string
	 */
	public static function build(string $uri, ...$params)
	{
		if ($params) {
			return sprintf($uri, ...$params);
		}

		return $uri;
	}
}