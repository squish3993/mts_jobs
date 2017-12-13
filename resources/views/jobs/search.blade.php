@extends('layouts.master')

@push('head')
    <link href='/css/app.css' rel='stylesheet'>
@endpush

@section('title')
    Search
@endsection

@section('content')
    <h1>Search</h1>

    <form method='GET' action='/jobs/search'>

        <div class='details'>* Required fields</div>

        <label for='searchTerm'>* Search by Event Name:</label>
        <input type='text' name='searchTerm' id='searchTerm' value='{{ $searchTerm or '' }}'>

        <br>
        <input type='submit' class='btn btn-primary btn-small' value='Search'>

    </form>

    @if($searchTerm != null)
        <h2>Results for query: <em>{{ $searchTerm }}</em></h2>

        @if(count($searchResults) == 0)
            No matches found.
        @else
            @foreach($searchResults as $eventName => $job)
                    
             <div class='jobs'>
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
                    <td><a href='/job/{{ $job['id'] }}/edit'>Edit</a> |</td>
                    <td><a href='/job/{{ $job['id'] }}/delete'>Delete</a></td>
                </tr>
             @endforeach
        </div>
                </div>
            @endforeach
        @endif
    @endif


@endsection