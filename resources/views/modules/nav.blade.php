@php
    $nav = [
        '' => 'Home',
        'jobs' => 'Jobs',
        'employees' => 'Employees',
        'job/create' => 'Add a Job',
        'employee/create' => 'Add an Employee',
    ];
@endphp

<nav>
    <ul>
        @foreach($nav as $link => $label)
            <li><a href='/{{ $link }}' class='{{ Request::is($link) ? 'active' : '' }}'>{{ $label }}</a>
        @endforeach
    </ul>
</nav>