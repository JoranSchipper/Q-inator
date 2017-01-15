<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QueueTrack extends Model
{
    public function queue()
    {
    	return $this->belongsTo('App\Queue');
    }
}
