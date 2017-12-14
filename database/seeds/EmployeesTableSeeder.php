<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
        	['Jacob', 'Lewis', 24, 'Part Time A/V Tech', 'Audio or Office'],
        	['Jack', 'Sparrow', 35, 'Captain/Supervisor', 'Problem Solving/Miscellaneous'],
        	['Bat', 'Man', 3, 'Intern', 'Anything']
        ];
        $count = count($employees);
    
        foreach ($employees as $key => $employee) 
        {
            Employee::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'firstName' => $employee[0],
                'lastName' =>$employee[1],
                'experience' => $employee[2],
                'jobTitle' => $employee[3],
                'preference' => $employee[4]
                ]);
               
            $count--;
       	 }
    }
}
