@extends('layouts.master')

@section('title')
	Add an Employee
@endsection

@section('content')

<h1>Add a New Employee</h1>

    <form method='POST' action='/employees'>

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='firstName'>* First Name</label>
        <input type='text' name='firstName' id='firstName'>
        

        <label for='lastName'>* Last Name</label>
        <input type='text' name='lastName' id='lastName'>

        
        <label for='experience'>* Months of Experience</label>
        <input type='text' name='experience' id='experience'>
        

        <label for='jobTitle'>* Job Title</label>
        <input type='text' name='jobTitle' id='jobTitle'>
        

        <label for='preference'>* What Kind of Jobs Do You Like?</label>
        <input type='text' name='preference' id='preference'>
        
        

        <input type='submit' value='Add Job' class='btn btn-primary btn-small'>
    </form>


@endsection