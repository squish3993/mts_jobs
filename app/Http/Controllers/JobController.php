<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
     public function index(Request $request)
    {
            $jobs = job::orderBy('eventName')->get();

    

        return view('jobs.index')->with([
            'jobs' => $jobs
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
        ]);

        # Add new book to the database
        $job = new Job();
        $job->eventName = $request->input('eventName');
        $job->name = $request->input('name');
        $job->department = $request->input('department');
        $job->dateAndTime = '2017-11-20 15:30:00';
        $job->location = $request->input('location');
        $job->specs = $request->input('specs');


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
        ]);

        $job = Job::find($id);

        
        $job->eventName = $request->input('eventName');
        $job->name = $request->input('name');
        $job->department = $request->input('department');
        $job->dateAndTime = '2017-11-20 15:30:00';
        $job->location = $request->input('location');
        $job->specs = $request->input('specs');
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

        

        $job->delete();

        return redirect('/jobs')->with('alert', $job->eventName.' was removed.');
    }
}
