<?php

namespace CupCoffee\SpotifyProvider;


use CupCoffee\SpotifyProvider\Api\Client;
use Reify\Data\JsonMapper;
use Reify\Mapper;
use Spotify\Track;

class Spotify
{
	private $apiClient;

	public function __construct()
	{
		$this->apiClient = new Client();
		$this->mapper = new Mapper();
	}

	private function map(string $json, $object)
	{
		return $this->mapper->map(new JsonMapper, $json)->to($object);
	}

	public function getTrack(string $id)
	{
		$response = $this->apiClient->getTrack($id);

		return $this->map($response, Track::class);
	}
}