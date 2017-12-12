<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Employee;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
            $employees = Employee::orderBy('lastName')->get();

    

        return view('employees.indexEmp')->with([
            'employees' => $employees	
        ]);
    }

    public function create()
    {
        return view('employees.createEmp');
        
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'lastName' => 'required',
            'firstName' => 'required',
            'experience' => 'required',
            'jobTitle' => 'required',
            'preference' => 'required'
            
        ]);

        # Add new book to the database
        $employee = new Employee();
        $employee->lastName = $request->input('lastName');
        $employee->firstName = $request->input('firstName');
        $employee->experience = $request->input('experience');
        $employee->jobTitle = $request->input('jobTitle');
        $employee->preference = $request->input('preference');   


        # Note: Not using the Eloquent `associate` method to connect book to authors
        # Why: because it would require an additional query to get the Author object
        # We already know the author id (it's in the request) so we just use that and
        # "manually" set the `author_id` for this book
        #$book->author_id = $request->input('author');

        $employee->save();

        # Note: You have to sync the tags *after* the book as been added to the database
        # This is because you need a `book_id` to create a relationship with a tag in the
        # `book_tag` pivot table, and the `book_id` will not exist until after the book is added
        #$book->tags()->sync($request->input('tags'));

        return redirect('/employees')->with('alert', 'The employee '.$request->input('lastName').' was added.');
    }
    
}
