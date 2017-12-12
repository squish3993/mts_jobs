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

	    # Now loop through the above array, creating a new pivot for each book to tag
	    foreach ($jobs as $eventName => $employees) {

	        # First get the book
	        $job = Job::where('eventName', 'like', $eventName)->first();

	        # Now loop through each tag for this book, adding the pivot
	        foreach ($employees as $lastName) {
	            $employee = Employee::where('lastName', 'LIKE', $lastName)->first();

	            # Connect this tag to this book
	            $job->employees()->save($employee);
        }
    }
    }
}
