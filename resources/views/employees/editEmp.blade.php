@extends('layouts.master')

@push('head')
    <link href='/css/Jobs/edit.css' rel='stylesheet'>
@endpush

@section('title')
	Edit an Employee
@endsection

@section('content')
    <div class='container text-center'>

    <h1>Edit This Employee</h1>
    <div class='details'>* Required fields</div>

    <form method='POST' action='/employee/{{ $employee->id }}'>

        {{ method_field('put') }}
        {{ csrf_field() }}

        <div class='form-group row'>
            <label for='firstName' class='col-sm-2 col-form-label'>* First Name</label>
            <div class='col-sm-5'>
                <input type='text' class ='form-control' name='firstName' id='firstName' value='{{ old('firstName', $employee->firstName) }}'>
            </div>
        </div>
        
        <div class='form-group row'>
            <label for='lastName' class='col-sm-2 col-form-label'>* Last Name</label>
            <div class='col-sm-5'>
                <input type='text' class ='form-control' name='lastName' id='lastName' value='{{ old('lastName', $employee->lastName) }}'>
            </div>
        </div>

        <div class='form-group row'>
            <label for='experience' class='col-sm-2 col-form-label'>* Months of Experience</label>
            <div class='col-sm-5'>
                <input type='text' class ='form-control' name='experience' id='experience' value='{{ old('experience', $employee->experience) }}'>
            </div>
        </div>
        
        <div class='form-group row'>
            <label for='jobTitle' class='col-sm-2 col-form-label'>* Job Title</label>
            <div class='col-sm-5'>
                <input type='text' class ='form-control' name='jobTitle' id='jobTitle' value='{{ old('jobTitle', $employee->jobTitle) }}'>
            </div>
        </div>
        
        <div class='form-group row'>
            <label for='preference' class='col-sm-2 col-form-label'>* What Kind of Jobs Do You Like?</label>
            <div class='col-sm-5'>
                <input type='text' class ='form-control' name='preference' id='preference' value='{{ old('preference', $employee->preference) }}'>
            </div>
        </div>
        
        

        <input type='submit' value='Save Changes' class='btn btn-primary btn-small'>
    </form>

</div>

@endsection