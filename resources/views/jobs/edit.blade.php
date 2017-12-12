@extends('layouts.master')

@section('title')
	Edit a Job
@endsection

@section('content')

<h1>edit</h1>

    <form method='POST' action='/job/{{ $job->id }}'>

        {{ method_field('put') }}

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='eventName'>* Event Name</label>
        <input type='text' name='eventName' id='eventName' value='{{ old('eventName', $job->eventName) }}'>
        

        <label for='name'>* Your Name</label>
        <input type='text' name='name' id='name' value='{{ old('name', $job->name) }}'>

        
        <label for='department'>* Department</label>
        <input type='text' name='department' id='department' value='{{ old('department', $job->department) }}'>
        

        <label for='location'>* Location</label>
        <input type='text' name='location' id='location' value='{{ old('locatiobn', $job->location) }}'>
        

        <label for='specs'>* Tell Us About Your Job</label>
        <input type='text' name='specs' id='specs' value='{{ old('specs', $job->specs) }}'>

        <label for='specs'>* How Many People Do You Need</label>
        <input type='text' name='numOnJob' id='numOnJob' value='{{ old('numOnJob', $job->numOnJob) }}'>
        
        

        <input type='submit' value='Save Changes' class='btn btn-primary btn-small'>
    </form>


@endsection