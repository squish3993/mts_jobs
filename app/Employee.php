<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function jobs()
	{
    	return $this->belongsToMany('App\Job')->withTimestamps();
	}

}



