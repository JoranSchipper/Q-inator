<?php

namespace CupCoffee\SpotifyProvider\Api;


class Endpoint
{
	const GET = "GET";
	const POST = "POST";

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

	private $method;
	private $uri;
	private $parameters;

	public function __construct($uri, $method = Endpoint::GET, ...$parameters)
	{
		$this->uri = $uri;
		$this->method = $method;
		$this->parameters = $parameters;
	}

	public function isPOST()
	{
		return $this->method == Endpoint::POST;
	}

	public function isGET()
	{
		return $this->method == Endpoint::GET;
	}

	public function getMethod()
	{
		return $this->method;
	}

	public function getPath()
	{
		return $this->buildUri($this->uri, ...$this->parameters);
	}

	/**
	 * @param string $uri
	 * @param array ...$params
	 * @return string
	 */
	private function buildUri(string $uri, ...$params)
	{
		if ($params) {
			return sprintf($uri, ...$params);
		}

		return $uri;
	}
}