@php
    $nav = [
        'jobs' => 'Jobs',
        'employees' => 'Employees',
        'job/create' => 'Add a Job',
        'search/job' => 'Search for a Job',
        'search/employee' => 'Search for an Employee'
    ];

@endphp

<nav>
    <ul>
        @foreach($nav as $link => $label)
            <li><a href='/{{ $link }}' class='{{ Request::is($link) ? 'active' : '' }}'>{{ $label }}</a>
        @endforeach

    </ul>
</nav>