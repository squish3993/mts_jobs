<?php

use Illuminate\Database\Seeder;
use App\Job;
use App\Employee;

class EmployeeJobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	        
	    $jobs =[
	        'Molecular Biology Conference' => ['Lewis'],
	        'Classical Music 101 Concert' => ['Sparrow', 'Man']
	    ];

	    foreach ($jobs as $eventName => $employees) 
	    {	        
	        $job = Job::where('eventName', 'like', $eventName)->first(); 
	        foreach ($employees as $lastName) 
	        {
	            $employee = Employee::where('lastName', 'LIKE', $lastName)->first();
				$job->employees()->save($employee);
        	}
    	}
    }
}
