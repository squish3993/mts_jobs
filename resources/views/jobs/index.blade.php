
@extends('layouts.master')

@push('head')
    <link href='/css/index.css' rel='stylesheet'>
@endpush

@section('title')
	MTS Jobs
@endsection

@section('content')
    <div class='sortbar container text-center'>
        @include('modules.sort')
    </div>
      
    <div class='jobs'>
	   <table class="table table-bordered container-fluid">
    			<tr>
    				<th>ID</th>
    				<th>Event Name</th>
    				<th>Event Host</th>
    				<th>Department</th>
    				<th>Date and Time</th>
    				<th>Location</th>
    				<th># of Employees Required</th>
    				<th> # of Employees Assigned</th>
    				<th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
    			</tr>
    		@foreach($jobs as $job)
    			<tr>
             		<td>{{ $job['id'] }}</td>
             		<td>{{ $job['eventName'] }}</td>
             		<td>{{ $job['name'] }}</td>
             		<td>{{ $job['department'] }}</td>
             		<td>{{ $job['dateAndTime'] }}</td>             		
                    <td>{{ $job['location'] }}</td>
             		<td>{{ $job['numOnJob'] }}</td>
             			
             		@if ($job['employees_count'] < $job['numOnJob'])
             			<td class='table-success'>
             				{{ $job['employees_count'] }}
             			</td>
             		@else
             			<td class='table-danger'>
             				{{ $job['employees_count'] }}
             			</td>
             		@endif
             		
             		<td><a href='/job/{{ $job['id'] }}/employees'>View Sign-Up Sheet</a></td>            		
             		<td><a href='/job/{{ $job['id'] }}/edit'>Edit</a></td>
             		<td><a href='/job/{{ $job['id'] }}/delete'>Delete</a></td>
             	</tr>
            @endforeach
	    </table>
    </div>	
@endsection
