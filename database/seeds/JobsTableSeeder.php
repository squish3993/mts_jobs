<?php

use Illuminate\Database\Seeder;
use App\Job;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = [
        	['Molecular Biology Conference', 'Jane Smith', 'MB&B', '2017-11-30 15:30:00', 'Northwest Labs B103', '1 Microphone and a Powerpoint Presentation', 1],
        	['Modern Fiction and Its future', 'John Doe', 'English', '2018-1-27 08:30:00', 'Barker 230', '4 Microhones for a panel. Video Recording and Speech Reinforcement.', 3],
        	['Classical Music 101 Concert', 'Johann Sebastian Bach', 'MUSC', '2018-5-20 17:00:00', 'Paine Hall', 'Video Recording',2]
        ];
        $count = count($jobs);
    
    foreach ($jobs as $key => $job) {
        Job::insert([
            'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
            'eventName' => $job[0],
            'name' =>$job[1],
            'department' => $job[2],
            'dateAndTime' => $job[3],
            'location' => $job[4],
            'specs' => $job[5],
            'numOnJob' => $job[6]
        ]);
        $count--;
    
    }
}
}
