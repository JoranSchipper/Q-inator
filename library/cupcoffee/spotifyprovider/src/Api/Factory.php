<?php

namespace CupCoffee\SpotifyProvider\Api;


use Psy\Util\Json;
use Reify\Data\JsonMapper;
use Reify\Mapper;

class Factory
{
	/**
	 * @var Client
	 */
	private $client;

	/**
	 * @var Mapper
	 */
	private $mapper;

	/**
	 * Factory constructor.
	 * @param Client $client
	 * @param Mapper $mapper
	 */
	public function __construct($client, $mapper)
	{
		$this->client = $client;
		$this->mapper = $mapper;
	}

	public function build(Endpoint $endpoint, $class, $parameters = [])
	{
		if ($endpoint->isGET()) {
			$response = $this->client->get($endpoint->uri, $parameters);
		}

		if ($endpoint->isPOST()) {
			$response = $this->client->post($endpoint->uri, $parameters);
		}

		if (isset($response) && $response) {
			return $this->mapper->map(new JsonMapper(), $response)->to($class);
		}

		return null;
	}
}