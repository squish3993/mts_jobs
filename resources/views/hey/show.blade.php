@extends('layouts.master')

@push('head')
    <link href='/css/index.css' rel='stylesheet'>
@endpush

@section('title')
	Job
@endsection

@section('content')
	<table class="table table-bordered container-fluid">
		<div class='jobs'>
			<tr>
				<th>ID</th>
				<th>Event Name</th>
				<th>Event Host</th>
				<th>Department</th>
				<th>Date and Time</th>
				<th>Location</th>
				<th>Comments</th>
				<th># of Employees Required</th>
				<th>Assigned Employees</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<tr>
		 		<td>{{ $job['id'] }}</td>
		 		<td>{{ $job['eventName'] }}</td>
		 		<td>{{ $job['name'] }}</td>
		 		<td>{{ $job['department'] }}</td>
		 		<td>{{ $job['dateAndTime'] }}</td>
		 		<td>{{ $job['location'] }}</td>
		 		<td>{{ $job['specs'] }}</td>
		 		<td>{{ $job['numOnJob'] }}</td>
		 		<td>
		 			<ol>
				 		@foreach ($employeesForThisJob as $id => $name)					 								 			
				 			<li>{{ $employeesForThisJob[$id] }} | 					 		
				 			<a href='/employee/{{ $job['id'] }}/{{ $lName[$id][0] }}/{{ $lName[$id][1] }}/remove'>Remove</a>
				 			</li>
				 		@endforeach
		 			</ol>
		 			@if ($job['numOnJob'] > $job['employees_count'])
				 			<a href='/employee/{{ $job['id'] }}/add'>Sign up for this Job!</a>
				 	@endif
		 		</td>
          		
		 		<td><a href='/job/{{ $job['id'] }}/edit'>Edit</a></td>
		 		<td><a href='/job/{{ $job['id'] }}/delete'>Delete</a></td>
		    </tr>
		</div>
	</table>
@endsection