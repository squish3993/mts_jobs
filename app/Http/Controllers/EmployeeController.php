<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Employee;
Use App\Job;

class EmployeeController extends Controller
{
    #Returns view of all employees
    public function index(Request $request)
    {
            $employees = Employee::orderBy('lastName')->get();

            return view('employees.indexEmp')->with([
                'employees' => $employees	
            ]);
    }

    #Returns view of all employees sorted by the input
    public function sort(Request $request, $sortterm)
    {
        $employees = Employee::orderBy($sortterm)->get();
        
        return view('employees.indexEmp')->with([
            'employees' => $employees                     
        ]);
    }

    #Returns the user to the Create an Employee webpage
    public function create()
    {
        return view('employees.createEmp');       
    }

    #Saves the information provided in the create page as a new Employee
    public function store(Request $request)
    {
        $this->validate($request, [
            'lastName' => 'required',
            'firstName' => 'required',
            'experience' => 'required|integer',
            'jobTitle' => 'required',
            'preference' => 'required'
        ]);

        $employee = new Employee();
        $employee->lastName = $request->input('lastName');
        $employee->firstName = $request->input('firstName');
        $employee->experience = $request->input('experience');
        $employee->jobTitle = $request->input('jobTitle');
        $employee->preference = $request->input('preference');   
        $employee->save();

        return redirect('/employees')->with('alert', 'The employee '.$request->input('lastName').' was added.');
    }

    #Returns the user to the edit an Employee page
    public function edit($id)
    {
        $employee = Employee::find($id);

        if (!$employee) 
        {
            return redirect('/employees')->with('alert', 'Employee not found');
        }

		return view('employees.editEmp')->with([
            'employee' => $employee
        ]);
    }

    #Updates the new information from the Edit and Employee page
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'lastName' => 'required',
            'firstName' => 'required',
            'experience' => 'required|integer',
            'jobTitle' => 'required',
            'preference' => 'required'
            
        ]);

        $employee = Employee::find($id);

        $employee->lastName = $request->input('lastName');
        $employee->firstName = $request->input('firstName');
        $employee->experience = $request->input('experience');
        $employee->jobTitle = $request->input('jobTitle');
        $employee->preference = $request->input('preference'); 
        $employee->save();
        
        return redirect('/employee/'.$id.'/edit')->with('alert', 'Your changes were saved.');
    }

    #Returns the user to the Delete and Employee confirmation page
    public function delete($id)
    {
        $employee = Employee::find($id);

        if (!$employee) 
        {
            return redirect('/employees')->with('alert', 'Employee not found');
        }

        return view('employees.deleteEmp')->with([
            'employee' => $employee,
        ]);
    }

    #Deletes the Employee from the Database
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!$employee) 
        {
            return redirect('/employees')->with('alert', 'Employee not found');
        }

        $employee->jobs()->detach();
        $employee->delete();

        return redirect('/employees')->with('alert', $employee->lastName.' was removed.');
    }

    #Returns the user to the Add an Employee page with a drop down of Employees
    public function add($id)
    {
        $allEmployees = Employee::getForDropdown();

        $job = Job::with('employees')->find($id);
        
         $theseEmployees = [];
            foreach ($job->employees as $employee) 
        {
            $theseEmployees[] = $employee->lastName.', '.$employee->firstName;
        }

        #This function creates an array of only Employees not currently assigned the Job
        #This prevents users from accidently signing up twice
        $employeesForDropdown=array_diff($allEmployees, $theseEmployees);

        
        return view('employees.add')->with([
            'employeesForDropdown' => $employeesForDropdown,
            'job' => $job
            ]);
    }    
} #EoC
