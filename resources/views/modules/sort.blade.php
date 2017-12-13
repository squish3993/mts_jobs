@php
    $sort = [
        'sort/id' => 'ID',
        'sort/eventName' => 'Event Name',
        'sort/name' => 'Event Host',
        'sort/department' => 'Department',
        'sort/dateAndTime' => 'Date',
        'sort/location' => 'Location',
        'sort/numOnJob' => '# Required'

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