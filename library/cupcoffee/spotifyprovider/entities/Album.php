<?php

namespace Spotify;

class Album
{
	/**
	 * @var string
	 */
	public $album_type = "";

	/**
	 * @var Artist[]
	 */
	public $artists;

	/**
	 * @var string[]
	 */
	public $available_markets;

	/**
	 * @var Copyright[]
	 */
	public $copyrights;

	/**
	 * @var ExternalId
	 */
	public $external_ids;

	/**
	 * @var ExternalUrl
	 */
	public $external_urls;

	/**
	 * @var string[]
	 */
	public $genres;

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
	 * @var integer
	 */
	public $popularity;

	/**
	 * @var string
	 */
	public $release_date;

	/**
	 * @var string
	 */
	public $release_date_precision;

	/**
	 * @var Track[]
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