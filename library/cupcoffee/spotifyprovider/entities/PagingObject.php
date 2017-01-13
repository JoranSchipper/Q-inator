<?php

namespace Spotify;


class PagingObject
{
	/**
	 * @var string
	 */
	public $href;

	/**
	 * @var array
	 */
	public $items;

	/**
	 * @var int
	 */
	public $limit;

	/**
	 * @var string|null
	 */
	public $next;

	/**
	 * @var int
	 */
	public $offset;

	/**
	 * @var string|null
	 */
	public $previous;

	/**
	 * @var int
	 */
	public $total;
}