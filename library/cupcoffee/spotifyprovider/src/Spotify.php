<?php

namespace CupCoffee\SpotifyProvider;


use CupCoffee\SpotifyProvider\Api\Client;
use CupCoffee\SpotifyProvider\Api\Endpoint;
use CupCoffee\SpotifyProvider\Api\Factory;
use Exception;
use Illuminate\Support\Facades\Session;
use Reify\Data\JsonMapper;
use Reify\Mapper;
use Spotify\Playlist;
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

			$this->objectFactory = new Factory($this->apiClient, $this->mapper);
		}
	}

	private function map(string $json, $object)
	{
		return $this->mapper->map(new JsonMapper, $json)->to($object);
	}

	/**
	 * Returns true if the acces token is present and not expired
	 * @return bool
	 */
	public function isAuthorized()
	{
		if (!Session::has('spotify.auth-time')) {
			return false;
		}

		return isset($this->user) && $this->user->expiresIn > time() - Session::get('spotify.auth-time');
	}

	public function getUser()
	{
		if (!isset($this->user)) {
			throw new Exception("User isn't authorized");
		}

		return $this->user;
	}

	public function getTrack(string $id)
	{
		$endpoint = new Endpoint(Endpoint::TRACK, Endpoint::GET, $id);
		return $this->objectFactory->build($endpoint, Track::class);
	}

	public function getTracks(array $ids)
	{
		$endpoint = new Endpoint(Endpoint::TRACKS);
		return $this->objectFactory->build($endpoint, Track::class, ['ids' => $ids]);
	}

	public function getPlaylist(string $user_id, string $id)
	{
		$endpoint = new Endpoint(Endpoint::PLAYLIST, Endpoint::GET, $user_id, $id);
		return $this->objectFactory->build($endpoint, Playlist::class);
	}

	public function createPlaylist(string $user_id, string $name, bool $public = false, bool $collaborative = false)
	{
		$endpoint = new Endpoint(Endpoint::PLAYLIST_CREATE, Endpoint::POST);
		return $this->objectFactory->build($endpoint, Playlist::class, [
			'name' => $name,
			'public' => $public,
			'collaborative' => $collaborative
		]);
	}

	public function addTracksToPlaylist(string $user_id, string $playlist_id, array $tracks)
	{
		$endpoint = new Endpoint(Endpoint::PLAYLIST_TRACKS, Endpoint::POST, $user_id, $playlist_id);
		$this->apiClient->post($endpoint->getPath(), ['uris' => $tracks]);
	}
}