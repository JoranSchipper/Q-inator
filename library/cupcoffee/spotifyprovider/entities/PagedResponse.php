<?php

namespace Spotify;

class PagedResponse extends Response
{
	/**
	 * @var Artist\PagingObject
	 */
	public $artists;

	/**
	 * @var Track\PagingObject
	 */
	public $tracks;

	/**
	 * @var Album\PagingObject
	 */
	public $albums;

	/**
	 * @var Playlist\PagingObject
	 */
	public $playlists;
}