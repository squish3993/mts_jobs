<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	#Defines relationship with Jobs
    public function jobs()
	{
    	return $this->belongsToMany('App\Job')->withTimestamps();
	}

	#Used to generate an array of all employees in database
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
}#EoM



