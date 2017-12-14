<!DOCTYPE html>
<html>
    <head>
        <title>
            @yield('title', 'MTS Jobs')
        </title>

        <meta charset='utf-8'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <link href="/css/app.css" type='text/css' rel='stylesheet'>

        @stack('head')

    </head>
    <body>
        <header>
            <div class='bigtitle container text-align:center'>   
                <h1> Media and Technology Services </h1>
                <h2> Jobs Database </h2>
           </div>

            @include('modules.nav')

        </header>

        <section id='main'>
            @yield('content')
        </section>


        @stack('body')

        @if(session('alert'))
            <div class='alert'>
                {{ session('alert') }}
            </div>
        @endif
    </body>
</html>
