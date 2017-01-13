<?php

namespace CupCoffee\SpotifyProvider\Api;

use GuzzleHttp\Client as HttpClient;

use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use Laravel\Socialite\Facades\Socialite;

class Client
{
	const API_BASE_URI = "https://api.spotify.com";
	const API_VERSION = "v1";

	private $httpClient;

	public function __construct()
	{
		$user = Socialite::with('spotify')->user();

		dump($user);

		$this->httpClient = new HttpClient([
			'base_uri' => self::API_BASE_URI . "/" . self::API_VERSION
		]);
	}

	private function get(string $uri, array $parameters = [])
	{
		try {
			$response = $this->httpClient->get($uri, [
				'query' =>  $parameters
			]);
		} catch (RequestException $exception) {
			echo $exception;
			return "";
		}

		if ($response instanceof ResponseInterface) {
			return $response->getBody()->getContents();
		}

		return "";
	}

	public function getTrack(string $id)
	{
		return $this->get(Uri::build(Uri::TRACK, $id));
	}

	public function getTracks(array $ids)
	{
		return $this->get(Uri::build(Uri::TRACKS), ['ids' => $ids]);
	}
}