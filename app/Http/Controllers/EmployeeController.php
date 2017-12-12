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
}
