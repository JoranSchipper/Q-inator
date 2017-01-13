<?php

namespace Spotify;

class Playlist
{
	/**
	 * @var boolean
	 */
	public $collaborative;

	/**
	 * @var string
	 */
	public $description;

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
	public $name;

	/**
	 * @var User
	 */
	public $owner;

	/**
	 * @var boolean|null
	 */
	public $public;

	/**
	 * @var string
	 */
	public $snapshot_id;

	/**
	 * @var Track\PagingObject[]
	 */
	public $tracks;

	/**
	 * @var string
	 */
	public $type;

	/**
	 * @var string
	 */
	public $uri;
}