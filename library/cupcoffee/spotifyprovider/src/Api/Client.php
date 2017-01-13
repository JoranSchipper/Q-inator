<?php

namespace CupCoffee\SpotifyProvider\Api;

use GuzzleHttp\Client as HttpClient;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use Laravel\Socialite\Facades\Socialite;

class Client
{
	const API_BASE_URI = "https://api.spotify.com";
	const API_VERSION = "v1";

	/**
	 * @var HttpClient
	 */
	private $httpClient;

	/**
	 * @var string
	 */
	private $access_token;

	public function __construct(string $access_token)
	{
		$this->access_token = $access_token;

		$this->httpClient = new HttpClient([
			'base_uri' => self::API_BASE_URI
		]);
	}

	private function get(string $uri, array $parameters = [])
	{
		try {
			$uri = self::API_VERSION . "$uri";

			$response = $this->httpClient->get($uri, [
				'headers' => [
					'Authorization' => "Bearer $this->access_token"
				],
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