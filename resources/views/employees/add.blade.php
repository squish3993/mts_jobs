@extends('layouts.master')

@push('head')
    <link href='/css/index.css' rel='stylesheet'>
@endpush

@section('title')
	Sign Up!
@endsection

@section('content')

<div class='text-center'>
	<h1>Sign Up for a Job!</h1>
	<h3>Select Your Name</h3>
	
	    <form method='POST' action='/job/{{ $job->id }}/add'>

	    	{{ method_field('put') }}

	        {{ csrf_field() }}

	   		<label for='employee'>Employee</label>
	    	<select name='employee' id='employee'>
	    		<option value="" selected="selected" disabled="disabled">Choose one...</option>
	    		@foreach($employeesForDropdown as $id => $name)
	        		<option value='{{ $id }}'>{{ $name }} </option>
	    		@endforeach
			</select>

			<input type='submit' value='Sign Up!' class='btn btn-primary btn-small'>
		</form>
	</div>
	


@endsection