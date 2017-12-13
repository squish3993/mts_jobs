@extends('layouts.master')

@push('head')
    <link href='/css/index.css' rel='stylesheet'>
    
@endpush

@section('title')
	MTS Employees
@endsection

@section('content')
	<div class='sortbar container text-center'>
       @include('modules.sortEmp')
      </div>

	<table class="table table-bordered container-fluid">
		<div class='employees'>
				<tr>
					<th>Last Name</th>
					<th>First Name</th>
					<th>Experience (Months)</th>
					<th>Job Title</th>
					<th>Job Preference</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			@foreach($employees as $employee)
				<tr>
             		<td>{{ $employee['lastName'] }}</td>
             		<td>{{ $employee['firstName'] }}</td>
             		<td>{{ $employee['experience'] }}</td>
             		<td>{{ $employee['jobTitle'] }}</td>
             		<td>{{ $employee['preference'] }}</td>
   

             		<td><a href='/employee/{{ $employee['id'] }}/edit'>Edit</a></td>
             		<td><a href='/employee/{{ $employee['id'] }}/delete'>Delete</a></td>
             	</tr>
             @endforeach
	    </div>
	</table>
	
@endsection