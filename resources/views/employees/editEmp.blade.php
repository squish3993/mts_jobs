@extends('layouts.master')

@section('title')
	Edit an Employee
@endsection

@section('content')

<h1>Edit an New Employee</h1>

    <form method='POST' action='/employee/{{ $employee->id }}'>

        {{ method_field('put') }}

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='firstName'>* First Name</label>
        <input type='text' name='firstName' id='firstName' value='{{ old('firstName', $employee->firstName) }}'>
        

        <label for='lastName'>* Last Name</label>
        <input type='text' name='lastName' id='lastName' value='{{ old('lastName', $employee->lastName) }}'>


        
        <label for='experience'>* Months of Experience</label>
        <input type='text' name='experience' id='experience' value='{{ old('experience', $employee->experience) }}'>
        

        <label for='jobTitle'>* Job Title</label>
        <input type='text' name='jobTitle' id='jobTitle' value='{{ old('jobTitle', $employee->jobTitle) }}'>
        

        <label for='preference'>* What Kind of Jobs Do You Like?</label>
        <input type='text' name='preference' id='preference' value='{{ old('preference', $employee->preference) }}'>
        
        

        <input type='submit' value='Save Changes' class='btn btn-primary btn-small'>
    </form>


@endsection