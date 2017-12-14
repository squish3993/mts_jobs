<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	#defines relationship with Employees
    public function employees()
	{
    	return $this->belongsToMany('App\Employee')->withTimestamps();
	}
} #EoM
