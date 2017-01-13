<?php

namespace Spotify\Track;

use Spotify\PagingObject as BasePagingObject;

class PagingObject extends BasePagingObject
{

	/**
	 * @var Spotify\Track[]
	 */
	public $items;
}