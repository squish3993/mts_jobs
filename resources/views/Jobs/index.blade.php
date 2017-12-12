@extends('layouts.master')

@push('head')
    <link href='/css/index.css' rel='stylesheet'>
@endpush

@section('title')
	MTS Jobs
@endsection

@section('content')
	<table>
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
					<th>View</th>
				</tr>
			@foreach($jobs as $job)
				<tr>
             		<td>{{ $job['id'] }}</td>
             		<td>{{ $job['eventName'] }}</td>
             		<td>{{ $job['name'] }}</td>
             		<td>{{ $job['department'] }}</td>
             		<td>{{ $job['dateAndTime'] }}</td>
             		<td>{{ $job['location'] }}</td>
             		<td>{{ $job['specs'] }}</td>
             		<td>{{ $job['numOnJob'] }}</td>
             		<td><a href='/job/{{ $job['id'] }}/employees'>View Sign-Up Sheet</a></td>            		
             		<td><a href='/job/{{ $job['id'] }}/edit'>Edit</a> |</td>
             		<td><a href='/job/{{ $job['id'] }}/delete'>Delete</a></td>
             	</tr>
             @endforeach
	    </div>
	</table>
	
@endsection
