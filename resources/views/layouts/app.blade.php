<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>
            @hasSection('title')
                @yield('title') - Wallet!
            @else
                Wallet!
            @endif
        </title>

        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
        <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">
        @yield('stylesheets')
    </head>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="{{ route('site') }}" class="logo">
                    <span class="logo-mini"><strong>W</strong></span>
                    <span class="logo-lg"><strong>Wallet</strong></span>
                </a>

                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" data-toggle="offcanvas" role="button" class="sidebar-toggle">
                        <span class="sr-only">Alternar navegação</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ asset('img/beethoven.jpg') }}" alt="Avatar" class="user-image">

                                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="{{ asset('img/beethoven.jpg') }}" class="img-circle" alt="Avatar">

                                        <p>
                                            {{ Auth::user()->name }}
                                            <small>Membro desde {{ Auth::user()->created_at->format('M/Y') }}</small>
                                        </p>
                                    </li>
                                    <li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-12 text-center">
                                                <a href="{{ route('dashboard.card.index') }}">Cartões</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ asset('img/beethoven.jpg') }}" class="img-circle" alt="Avatar">
                        </div>
                        <div class="pull-left info">
                            <p>{{ Auth::user()->name }}</p>
                            <a href="javascript:void()"><i class="fa fa-circle text-success"></i> {{ Auth::user()->email }}</a>
                        </div>
                    </div>

                    <ul class="sidebar-menu">
                        <li class="header">NAVEGAÇÃO</li>
                        <li class="active">
                            <a href="{{ route('dashboard') }}">
                                <i class="fa fa-dashboard"></i>
                                <span>Início</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.card.index') }}">
                                <i class="fa fa-credit-card-alt"></i>
                                <span>Cartões</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        @yield('title')
                        <small>@yield('description')</small>
                    </h1>
                </section>

                <section class="content">
                    @yield('content')
                </section>
            </div>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    Lorem ipsum dolor sit amet.
                </div>

                <strong>&copy; {{ date('Y') }} Wallet.</strong>
            </footer>
        </div>

        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
        <script src="{{ asset('js/adminlte.js') }}"></script>
        @yield('javascripts')
    </body>
</html>
