<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Employee;

class JobController extends Controller
{
     public function index(Request $request)
    {
        $jobs = Job::withCount('employees')->orderBy('id')->get();
        
       

     return view('jobs.index')->with([
            'jobs' => $jobs,
                      
        ]);
    }

    public function sort(Request $request, $sortterm)
    {
        $jobs = Job::withCount('employees')->orderBy($sortterm)->get();
        
       

     return view('jobs.index')->with([
            'jobs' => $jobs,
                      
        ]);
    }

    public function signUp($id)
    {
        $job = Job::withCount('employees')->find($id);

        $employeesForThisJob= [];
        $lName= [];
        
        
        foreach ($job->employees as $employee) 
        {
            $employeesForThisJob[] = $employee->lastName.', '.$employee->firstName;
            
        }
        

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

    public function create()
    {
        return view('jobs.create');
        
    }

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

        # Add new book to the database
        $job = new Job();

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


        # Note: Not using the Eloquent `associate` method to connect book to authors
        # Why: because it would require an additional query to get the Author object
        # We already know the author id (it's in the request) so we just use that and
        # "manually" set the `author_id` for this book
        #$book->author_id = $request->input('author');

        $job->save();

        # Note: You have to sync the tags *after* the book as been added to the database
        # This is because you need a `book_id` to create a relationship with a tag in the
        # `book_tag` pivot table, and the `book_id` will not exist until after the book is added
        #$book->tags()->sync($request->input('tags'));

        return redirect('/jobs')->with('alert', 'The job '.$request->input('eventName').' was added.');
    }

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


    /*
    * PUT /job/{id}
    */
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

    public function delete($id)
    {
        $job = Job::find($id);

        if (!$job) {
            return redirect('/jobs')->with('alert', 'Job not found');
        }

        return view('jobs.delete')->with([
            'job' => $job,
        ]);
    }


    /*
    * Actually deletes the job
    * DELETE
    * /book/{id}/delete
    */
    public function destroy($id)
    {
        $job = Job::find($id);

        if (!$job) {
            return redirect('/jobs')->with('alert', 'Job not found');
        }

        
        $job->employees()->detach();
        $job->delete();

        return redirect('/jobs')->with('alert', $job->eventName.' was removed.');
    }

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

    public function attach(Request $request, $id)
    {
        $job = Job::with('employees')->find($id);
        $employee = $request->input('employee');

        
        $job->employees()->attach($employee);

        return redirect('/job/'.$job->id.'/employees');
        
        
    }


}

