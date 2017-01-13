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

	private $access_token;

	public function __construct()
	{
		$this->access_token = Session::get('spotify.access_token');

		$this->apiClient = new Client($this->access_token);
		$this->mapper = new Mapper();
	}

	private function map(string $json, $object)
	{
		return $this->mapper->map(new JsonMapper, $json)->to($object);
	}

	public function isAuthorized()
	{
		return isset($this->access_token);
	}

	public function authorize()
	{
		return Socialite::with('spotify')->redirect();
	}

	public function getTrack(string $id)
	{
		$response = $this->apiClient->getTrack($id);

		return $this->map($response, Track::class);
	}
}