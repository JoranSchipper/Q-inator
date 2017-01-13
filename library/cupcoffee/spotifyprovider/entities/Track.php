<?php

namespace Spotify;

class Track
{
	/**
	 * @var Album
	 */
	public $album;

	/**
	 * @var Artist[]
	 */
	public $artists;

	/**
	 * @var string[]
	 */
	public $available_markets;

	/**
	 * @var int
	 */
	public $disc_number;

	/**
	 * @var int
	 */
	public $duration_ms;

	/**
	 * @var boolean
	 */
	public $explicit;

	/**
	 * @var ExternalId
	 */
	public $external_ids;

	/**
	 * @var ExternalUrl
	 */
	public $external_urls;

	/**
	 * @var string
	 */
	public $href;

	/**
	 * @var string
	 */
	public $id;

	/**
	 * @var boolean
	 */
	public $is_playable;

	/**
	 * @var TrackLink
	 */
	public $linked_from;

	/**
	 * @var string
	 */
	public $name;

	/**
	 * @var int
	 */
	public $popularity;

	/**
	 * @var string|null
	 */
	public $preview_url;

	/**
	 * @var int
	 */
	public $track_number;

	/**
	 * @var string
	 */
	public $type;

	/**
	 * @var string
	 */
	public $uri;
}