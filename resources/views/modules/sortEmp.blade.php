@php
    $sort = [
        'sortEmp/lastName' => 'Last Name',
        'sortEmp/firstName' => 'First Name',
        'sortEmp/experience' => 'Experience',
        'sortEmp/jobTitle' => 'Job Title'

    ];

@endphp

<nav>
    <ul>
        <li>Sort By:</li>
        @foreach($sort as $link => $label)
            <li><a href='/{{ $link }}' class='{{ Request::is($link) ? 'active' : '' }}'>{{ $label }}</a>
        @endforeach

    </ul>
</nav>