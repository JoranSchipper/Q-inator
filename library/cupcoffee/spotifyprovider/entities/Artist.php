<?php

namespace Spotify;

use Illuminate\Support\Collection;
use Spotify;

class Artist
{
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
	 * @var int
	 */
	public $popularity;

	/**
	 * @var string
	 */
	public $type;

	/**
	 * @var string
	 */
	public $uri;

	/**
	 * @return Collection
	 */
	public function getRelatedArtists()
	{
		return Spotify::getArtistRelatedArtists($this->id);
	}

	/**
	 * @return Collection
	 */
	public function getTopTracks()
	{
		return Spotify::getArtistTopTracks($this->id);
	}

	/**
	 * @return Collection
	 */
	public function getAlbums()
	{
		return Spotify::getArtistAlbums($this->id);
	}
}