@extends('layouts.master')

@push('head')
    <link href='/css/Jobs/create.css' rel='stylesheet'>
@endpush

@section('title')
	Add an Employee
@endsection

@section('content')

<div class='container text-center'>

    <h1>Add a New Employee</h1>
    <div class='details'>* Required fields</div>

    <form method='POST' action='/employees'>

        {{ csrf_field() }}

        <div class='form-group row'>
            <label for='firstName' class='col-sm-2 col-form-label'>* First Name</label>
            <div class='col-sm-5'>
                <input type='text' class ='form-control' name='firstName' id='firstName'>
            </div>
             @include('modules.error', ['fieldName' => 'firstName'])
        </div>
        
        <div class='form-group row'>
            <label for='lastName' class='col-sm-2 col-form-label'>* Last Name</label>
            <div class='col-sm-5'>
                <input type='text' class ='form-control' name='lastName' id='lastName'>
            </div>
             @include('modules.error', ['fieldName' => 'lastName'])
        </div>

        <div class='form-group row'>
            <label for='experience' class='col-sm-2 col-form-label'>* Months of Experience</label>
            <div class='col-sm-5'>
                <input type='text' class ='form-control' name='experience' id='experience'>
            </div>
             @include('modules.error', ['fieldName' => 'experience'])
        </div>
        
        <div class='form-group row'>
            <label for='jobTitle' class='col-sm-2 col-form-label'>* Job Title</label>
            <div class='col-sm-5'>
                <input type='text' class ='form-control' name='jobTitle' id='jobTitle'>
            </div>
             @include('modules.error', ['fieldName' => 'jobTitle'])
        </div>
        
        <div class='form-group row'>
            <label for='preference' class='col-sm-2 col-form-label'>* What Kind of Jobs Do You Like?</label>
            <div class='col-sm-5'>
                <input type='text' class ='form-control' name='preference' id='preference'>
            </div>
             @include('modules.error', ['fieldName' => 'preference'])
        </div>
        
        

        <input type='submit' value='Add Employee' class='btn btn-primary btn-small'>
    </form>

</div>

@endsection