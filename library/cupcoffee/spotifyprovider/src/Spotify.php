<?php

namespace CupCoffee\SpotifyProvider;


use CupCoffee\SpotifyProvider\Api\Client;
use Illuminate\Support\Facades\Session;
use Reify\Data\JsonMapper;
use Reify\Mapper;
use Spotify\Track;

class Spotify
{
	private $apiClient;

	private $user;

	public function __construct()
	{
		$this->user = Session::get('spotify.user');

		if ($this->user) {
			$this->apiClient = new Client($this->user->token);
			$this->mapper = new Mapper();
		}
	}

	private function map(string $json, $object)
	{
		return $this->mapper->map(new JsonMapper, $json)->to($object);
	}

	public function isAuthorized()
	{
		return isset($this->user);
	}

	public function getTrack(string $id)
	{
		$response = $this->apiClient->getTrack($id);

		return $this->map($response, Track::class);
	}
}