<?php

namespace Spotify\Artist;

use Spotify\PagingObject as BasePagingObject;

class PagingObject extends BasePagingObject
{

	/**
	 * @var \Spotify\Artist[]
	 */
	public $items;
}