<?php

namespace Spotify;


class User
{
	/**
	 * @var string
	 */
	public $display_name;

	/**
	 * @var ExternalUrl
	 */
	public $external_urls;

	/**
	 * @var Followers
	 */
	public $followers;

	/**
	 * @var string
	 */
	public $href;

	/**
	 * @var string
	 */
	public $id;

	/**
	 * @var Image[]
	 */
	public $images;

	/**
	 * @var string
	 */
	public $type;

	/**
	 * @var string
	 */
	public $uri;
}