@extends('layouts.master')

@push('head')
    <link href='/css/index.css' rel='stylesheet'>
    
@endpush

@section('title')
	MTS Employees
@endsection

@section('content')
	<table>
		<div class='employees'>
				<tr>
					<th>ID</th>
					<th>Last Name</th>
					<th>First Name</th>
					<th>Experience</th>
					<th>Job Title</th>
					<th>Job Preference</th>
				</tr>
			@foreach($employees as $employee)
				<tr>
             		<td>{{ $employee['id'] }}</td>
             		<td>{{ $employee['lastName'] }}</td>
             		<td>{{ $employee['firstName'] }}</td>
             		<td>{{ $employee['experience'] }}</td>
             		<td>{{ $employee['jobTitle'] }}</td>
             		<td>{{ $employee['preference'] }}</td>
   

             		<td><a href='/employee/{{ $employee['id'] }}/edit'>Edit</a> |</td>
             		<td><a href='/employee/{{ $employee['id'] }}/delete'>Delete</a></td>
             	</tr>
             @endforeach
	    </div>
	</table>
	
@endsection