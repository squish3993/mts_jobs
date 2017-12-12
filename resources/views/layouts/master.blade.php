<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'MTS Jobs')
    </title>

    <meta charset='utf-8'>

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href="/css/foobooks.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

    @if(session('alert'))
        <div class='alert'>
            {{ session('alert') }}
        </div>
    @endif

    <header>
        <div class='container text-align:center'>   
            <h1> Media and Technology Services </h1>
            <h2> Jobs Database </h2>
       </div>

        @include('modules.nav')

    </header>

    <section id='main'>
        @yield('content')
    </section>


    @stack('body')

</body>
</html>
