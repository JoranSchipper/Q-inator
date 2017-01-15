<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
	public function tracks()
	{
		return $this->hasMany('App\QueueTrack');
	}
}
