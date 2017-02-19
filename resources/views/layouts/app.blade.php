<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (Auth::user())
                            <li><a href="{{ url('/subscriber/list') }}">{{trans('app.subscribers')}}</a></li>
                            <li><a href="{{ url('/lists') }}">{{trans('app.lists')}}</a></li>
                            <li><a href="{{url('/send-email')}}">{{trans('app.send')}} e-mail</a></li>
                            <li><a href="{{url('/settings')}}">{{trans('app.settings')}}</a></li>
                        @endif
                        &nbsp;
                                            

                    </ul>
    
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <form method="POST" action="{{URL::route('language-chooser')}}" {{\App::isLocale('en') ? ' class=hidden':''}}>
                                {{csrf_field()}}
                                <input type="hidden" name="locale" value="en">
                                <input type="submit" value="EN" class="btn btn-default btn-xs">
                            </form>
                            <form method="POST" action="{{URL::route('language-chooser')}}" {{\App::isLocale('ru') ? ' class=hidden':''}}>
                                {{csrf_field()}}
                                <input type="hidden" name="locale" value="ru">
                                <input type="submit" value="RU"  class="btn btn-default btn-xs">
                            </form>
                            <form method="POST" action="{{URL::route('language-chooser')}}" {{\App::isLocale('ua') ? ' class=hidden':''}}>
                                {{csrf_field()}}
                                <input type="hidden" name="locale" value="ua">
                                <input type="submit" value="UA" class="btn btn-default btn-xs">
                            </form>
                        </li>
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">{{trans('app.login')}}</a></li>
                            <li><a href="{{ url('/register') }}">{{trans('app.register')}}</a></li>
                        @else
                            

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->email }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{trans('app.logout')}}
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
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
    </div>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js')}}"></script>
</body>
</html>
