<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
	public function tracks()
	{
		return $this->hasMany('App\QueueTrack');
	}
}
