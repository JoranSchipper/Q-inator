<?php

namespace Spotify\Playlist;

use Spotify\PagingObject as BasePagingObject;

class PagingObject extends BasePagingObject
{

	/**
	 * @var Spotify\Playlist[]
	 */
	public $items;
}