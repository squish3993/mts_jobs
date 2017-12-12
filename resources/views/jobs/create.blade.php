@extends('layouts.master')

@section('title')
	Add a Job
@endsection

@section('content')

<h1>Add a New Job</h1>

    <form method='POST' action='/jobs'>

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='eventName'>* Event Name</label>
        <input type='text' name='eventName' id='eventName'>
        

        <label for='name'>* Your Name</label>
        <input type='text' name='name' id='name'>

        
        <label for='department'>* Department</label>
        <input type='text' name='department' id='department'>
        

        <label for='location'>* Location</label>
        <input type='text' name='location' id='location'>
        

        <label for='specs'>* Tell Us About Your Job</label>
        <input type='text' name='specs' id='specs'>

        <label for='numOnJob'>* How many People do you need</label>
        <input type='text' name='numOnJob' id='numOnJob'>
        
        

        <input type='submit' value='Add Job' class='btn btn-primary btn-small'>
    </form>


@endsection