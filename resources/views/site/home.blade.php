<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Wallet! - Seus cartões de crédito em um só lugar</title>

        <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="navbar navbar-inverse menu-wrap">
            <div class="navbar-header text-center">
                <a href="#!" class="navbar-brand logo-right">
                    <i class="mdi-action-account-balance-wallet"></i>
                    Wallet
                </a>
            </div>

            <ul class="nav navbar-nav main-navigation">
                <li class="active">
                    <a href="#home">Início</a>
                </li>
                <li>
                    <a href="#whatis">O que é?</a>
                </li>
                <li>
                    <a href="#work">Produtividade</a>
                </li>
                <li>
                    <a href="#entities">Entidades</a>
                </li>

                @if(Auth::guest())
                    <li>
                        <a href="#register">Registrar</a>
                    </li>
                @endif

                <li>
                    @if (Auth::guest())
                        <a href="{{ url('login') }}">Entrar</a>
                    @else
                        <a href="{{ route('dashboard') }}">Olá, {{ Auth::user()->first_name }}</a>
                    @endif
                </li>
            </ul>

            <button class="close-button" id="close-button">Fechar menu</button>
        </div>

        <div class="content-wrap">
            <header id="home" class="hero-area">
                <div class="container">
                    <div class="col-md-12">
                        <div class="navbar navbar-inverse sticky-navigation navbar-fixed-top" role="navigation" data-spy="affix" data-offset-top="200">
                            <div class="container">
                                <div class="navbar-header">
                                    <a href="{{ route('site') }}" class="logo-left">
                                        <i class="mdi-action-account-balance-wallet"></i>
                                        Wallet
                                    </a>
                                </div>

                                <div class="navbar-right">
                                    <button class="menu-icon" id="open-button">
                                        <i class="mdi-navigation-menu"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contents text-right">
                        <h1 class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">Wallet. Gerencie seus cartões de crédito.</h1>
                        <p class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">Controle simples, rápido e seguro.</p>
                        @if (Auth::guest())
                            <a href="#register" data-wow-duration="1000ms" data-wow-delay="400ms" class="btn btn-lg btn-primary wow fadeInUp">Registre</a>
                        @else
                            <a href="{{ route('dashboard') }}" data-wow-duration="1000ms" data-wow-delay="400ms" class="btn btn-lg btn-primary wow fadeInUp">Entre, {{ Auth::user()->first_name }}</a>
                        @endif
                        <a href="#whatis" data-wow-duration="1000ms" data-wow-delay="500ms" class="btn btn-lg btn-border wow fadeInUp">Saiba mais</a>
                    </div>
                </div>
            </header>
        </div>

        <section class="section" id="whatis">
            <div class="container">
                <div class="section-header">
                    <h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="100ms">O que é?</h1>
                    <h2 class="section-subtitle wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">Entenda como funciona</h2>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <div class="features">
                            <div class="icon">
                                <i class="mdi-action-settings"></i>
                            </div>
                            <div class="features-text">
                                <h4>Feito com Bootstrap 3.5.x</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis accusamus numquam veritatis.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
                        <div class="features">
                            <div class="icon">
                                <i class="mdi-action-done-all"></i>
                            </div>
                            <div class="features-text">
                                <h4>Material Design</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis accusamus numquam veritatis.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">
                        <div class="features">
                            <div class="icon">
                                <i class="mdi-image-blur-linear"></i>
                            </div>
                            <div class="features-text">
                                <h4>Visual Limpo</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis accusamus numquam veritatis.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="650ms">
                        <div class="features">
                            <div class="icon">
                                <i class="mdi-communication-business"></i>
                            </div>
                            <div class="features-text">
                                <h4>Perfeito para Empresas</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis accusamus numquam veritatis.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="750ms">
                        <div class="features">
                            <div class="icon">
                                <i class="mdi-action-favorite"></i>
                            </div>
                            <div class="features-text">
                                <h4>Feito para Você</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis accusamus numquam veritatis.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="850ms">
                        <div class="features">
                            <div class="icon">
                                <i class="mdi-hardware-phonelink"></i>
                            </div>
                            <div class="features-text">
                                <h4>Totalmente Responsivo</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis accusamus numquam veritatis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="work">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <img src="{{ asset('img/nexus.png') }}" alt="Wallet" width="300">
                    </div>

                    <div class="col-md-6 col-sm-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="3000ms">
                        <div class="pull-left content">
                            <h2>Agilize sua vida financeira</h2>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore impedit, asperiores dolores reiciendis officia odit ex sequi, dicta ipsa?<br>Pariatur facilis voluptatibus eum sit! Facilis odit voluptate perferendis nam quisquam!<br></p>

                            <ul class="list-item">
                                <li>
                                    <i class="mdi-action-done"></i>
                                    Visualização de extratos
                                </li>
                                <li>
                                    <i class="mdi-action-done"></i>
                                    Controle de limites
                                </li>
                                <li>
                                    <i class="mdi-action-done"></i>
                                    Programa de milhas
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section main-feature-gray" id="entities">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <div class="feature-item">
                            <h3 class="title-small">Funciona com todos os cartões <small>*</small></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum recusandae rem est sequi molestias pariatur deserunt doloremque rerum maiores, culpa placeat quis, excepturi quia perferendis. Ut asperiores nihil, optio fugiat!</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <img src="{{ asset('img/cards.png') }}" alt="Bandeiras" class="img-responsive">
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="register">
            <div class="container">
                <div class="section-header text-center">
                    <h1 class="section-title wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">Registre-se</h1>
                    <h2 class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">Tenha maior controle de seus cartões</h2>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-4 col-md-offset-2 col-sm-offset-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                        @include('auth.register')
                    </div>
                </div>
            </div>
        </section>

        <section id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="copyright-text">
                            &copy; Wallet {{ date('Y') }}.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/site.js') }}"></script>
  </body>
</html>
