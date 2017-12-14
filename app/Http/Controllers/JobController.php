<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Employee;

class JobController extends Controller
{
    #Returns the user to the view all Jobs page
    public function index(Request $request)
    {
        $jobs = Job::withCount('employees')->orderBy('id')->get();
        
        return view('jobs.index')->with([
            'jobs' => $jobs,                      
        ]);
    }

    #Sorts the jobs based on the input
    public function sort(Request $request, $sortterm)
    {
        $jobs = Job::withCount('employees')->orderBy($sortterm)->get();
     
        return view('jobs.index')->with([
            'jobs' => $jobs                    
        ]);
    }

    #Returns the View Job page where the user can sign up for that particular job
    public function signUp($id)
    {
        #Job is loaded 'withcount' for use in display file to make sure the Job isn't overloaded 
        $job = Job::withCount('employees')->find($id);

        $employeesForThisJob= [];
        $lName= []; 

        #Creates an array that is passed to the HTML file to display signed up Employees    
        foreach ($job->employees as $employee) 
        {
            $employeesForThisJob[] = $employee->lastName.', '.$employee->firstName;          
        }
        
        #Creates an array that is passed to the HTML file to create a "Remove link" for this particular employee
        foreach( $employeesForThisJob as $id)
        {
            $lName[] = explode(", ", $id);
        }

        return view('jobs.show')->with
            ([
                'employeesForThisJob' => $employeesForThisJob,
                'job' => $job,
                'lName' => $lName                
            ]);
    }

    #Attaches an Employee to the Job
    public function attach(Request $request, $id)
    {
        $job = Job::with('employees')->find($id);
        $employee = $request->input('employee'); 
        
        $job->employees()->attach($employee);

        return redirect('/job/'.$job->id.'/employees');      
    }

    #Returns the user to the Add a Job page
    public function create()
    {
        return view('jobs.create');      
    }

    #Stores the new job in the Database
    public function store(Request $request)
    {
        $this->validate($request, [
            'eventName' => 'required',
            'name' => 'required',
            'department' => 'required',
            'location' => 'required',
            'specs' => 'required',
            'numOnJob' => 'required|integer'
        ]);

        $job = new Job();

        #Following code is used to convert Dropdown date and time input menu into readable dateTime format. 
        #dateTime doesn't need validation because the drop down menu prevents any malicious inputs
        $date = $request->input('year').'-'.$request->input('month').'-'.$request->input('day');
        $hour = null;
        
        if ($request->input('afternoon')=='AM')
        {
            $hour = $request->input('hour');
        }
        else 
        {
            $hour = $request->input('hour') + 12;
        }

        $time = $hour.'-'.$request->input('minute').'-00';
        $datetime= $date.' '.$time;

        $job->eventName = $request->input('eventName');
        $job->name = $request->input('name');
        $job->department = $request->input('department');
        $job->dateAndTime = $datetime;
        $job->location = $request->input('location');
        $job->specs = $request->input('specs');
        $job->numOnJob = $request->input('numOnJob');
        $job->save();
        return redirect('/jobs')->with('alert', 'The job '.$request->input('eventName').' was added.');
    }

    #Returns the user to the Job Edit webpage
    public function edit($id)
    {
        $job = Job::find($id);

        if (!$job) {
            return redirect('/jobs')->with('alert', 'Job not found');
        }

		return view('jobs.edit')->with([
            'job' => $job
        ]);
    }

    #Updates the information from the edit page
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'eventName' => 'required',
            'name' => 'required',
            'department' => 'required',
            'location' => 'required',
            'specs' => 'required',
            'numOnJob' => 'required|integer'
        ]);

        $job = Job::find($id);

        #Following code is to convert Date and Time dropdown input to readable dateTime format
        $date = $request->input('year').'-'.$request->input('month').'-'.$request->input('day');
        $hour = null;
        if ($request->input('afternoon')=='AM')
        {
            $hour = $request->input('hour');
        }
        else 
        {
            $hour = $request->input('hour') + 12;
        }

        $time = $hour.'-'.$request->input('minute').'-00';
        $datetime= $date.' '.$time;
        
        $job->eventName = $request->input('eventName');
        $job->name = $request->input('name');
        $job->department = $request->input('department');
        $job->dateAndTime = $datetime;
        $job->location = $request->input('location');
        $job->specs = $request->input('specs');
        $job->numOnJob = $request->input('numOnJob');
        $job->save();

        return redirect('/job/'.$id.'/edit')->with('alert', 'Your changes were saved.');
    }

    #Returns the user to the Delete job confirmation page
    public function delete($id)
    {
        $job = Job::find($id);

        if (!$job) 
        {
            return redirect('/jobs')->with('alert', 'Job not found');
        }

        return view('jobs.delete')->with([
            'job' => $job
        ]);
    }

    #Deletes the job from the database
    public function destroy($id)
    {
        $job = Job::find($id);

        if (!$job) 
        {
            return redirect('/jobs')->with('alert', 'Job not found');
        }

        $job->employees()->detach();
        $job->delete();

        return redirect('/jobs')->with('alert', $job->eventName.' was removed.');
    }

    #Removes an employee from the job
   public function remove($id, $lastName, $firstName)
    {
        $job = Job::find($id);
        $employee = Employee::where('lastName', '=', $lastName)->where('firstName', '=', $firstName)->first();

        if (!$employee) 
        {
            return redirect('/jobs')->with('alert', 'Employee not found');
        }
        
        $job->employees()->detach($employee->id);
       
        return redirect('/job/'.$job->id.'/employees')->with('alert', $employee->lastName.', '.$employee->firstName. ' was removed from the job.');
    }
} #Eoc

