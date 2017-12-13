<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function jobs()
	{
    	return $this->belongsToMany('App\Job')->withTimestamps();
	}

	public static function getForDropdown()
	{
	    $employees = Employee::orderBy('lastName')->get();

	    $employeesforDropdown = [];

	    foreach ($employees as $employee) 
	    {
	        $employeesforDropdown[$employee['id']] = $employee->lastName.', '.$employee->firstName;
	    }

		return $employeesforDropdown;
	}
}



