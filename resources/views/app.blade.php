<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        @include('partials.nav')
        
        <main>
            @yield('content')
        </main>

    </body>
</html>  