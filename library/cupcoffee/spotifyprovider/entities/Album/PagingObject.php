<?php

namespace Spotify\Album;

use Spotify\Album;
use Spotify\PagingObject as BasePagingObject;

class PagingObject extends BasePagingObject
{

	/**
	 * @var Spotify\Album[]
	 */
	public $items;
}