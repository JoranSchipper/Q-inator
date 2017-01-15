<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class QueueController extends Controller
{
	public function index()
	{
		dump(session()->all());
	}

	public function create()
	{

	}
}