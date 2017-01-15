<?php

namespace CupCoffee\SpotifyProvider\Api;


class Endpoint
{
	const GET = "GET";
	const POST = "POST";

	public $method;
	public $uri;

	public function __construct($uri, $method = Endpoint::GET)
	{
		$this->uri = $uri;
		$this->method = $method;
	}

	public function isPOST()
	{
		return $this->method == Endpoint::POST;
	}

	public function isGET()
	{
		return $this->method == Endpoint::GET;
	}
}