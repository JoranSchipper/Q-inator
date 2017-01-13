<?php

namespace CupCoffee\SpotifyProvider\Api;

class Uri
{
	const TRACK = "/tracks/%s";
	const TRACKS = "/tracks";

	public static function build(string $uri, ...$params)
	{
		if ($params) {
			return sprintf($uri, ...$params);
		}

		return $uri;
	}
}