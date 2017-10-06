<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'SKCC') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- Script -->
    @stack('scripts')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ route('home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('task')}}"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                            TASKS</a></li>
                    <li><a href="{{ route('status')}}"><span class="glyphicon glyphicon-info-sign"
                                                             aria-hidden="true"></span> STATUS</a></li>
                    <li><a href="{{ route('contest-scoreboard',1)}}"><span class="glyphicon glyphicon-star-empty"
                                                                           aria-hidden="true"></span> CURRENT SCOREBOARD</a>
                    </li>
                    <li><a href="{{ route('message')}}"><span class="glyphicon glyphicon-question-sign"
                                                              aria-hidden="true"></span> MESSAGES</a></li>
                    <li><a href="{{ route('contest')}}"><span class="glyphicon glyphicon-play-circle"
                                                              aria-hidden="true"></span> CONTESTS</a></li>
                    @if(Gate::allows('admin'))
                        <li><a href="{{ route('admin')}}">ADMIN</a></li>
                    @endif
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                    <!--<li><a href="{{ route('register') }}">Register</a></li>-->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><span class="glyphicon glyphicon-user"
                                                           aria-hidden="true"></span> {{ Auth::user()->name }} <span
                                        class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


    <footer>
        <div class="container">
            <hr>
            <p>© 2017 Suankularb Computer Club, All Right Reserved.</p>
        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
