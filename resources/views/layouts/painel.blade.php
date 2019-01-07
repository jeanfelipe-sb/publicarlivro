<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{!! asset('img/logo-home.png') !!}"/>

        <title>Meu Livro Publicado - @yield('title')</title>
        <link href="{{ asset('css/linearicons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
        <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
        <link href="{{ asset('css/nice-select.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style4.css') }}" rel="stylesheet">



    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3 style="color: white;">Meu Livro Publicado</h3>
                    <strong>EC</strong>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="{{ route('criar.projeto') }}">
                            <i class="fa fa-book"></i>
                            Criar Projeto
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('painel.home') }}">
                            <i class="fa fa-book"></i>
                            Meus Projetos
                        </a>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-copy"></i>
                            Minha Conta
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="{{ route('painel.minha-conta') }}">Meus dados</a>
                            </li>
                            <li>
                                <a href="{{ route('painel.minha-conta.editar') }}">Editar Dados</a>
                            </li>
                            <li>
                                <a href="{{ route('painel.minha-conta.senha') }}">Alterar senha</a>
                            </li>
                        </ul>
                    </li>  
                </ul>


            </nav>

            <!-- Page Content  -->
            <div id="content">

                <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="btn btn-info roxo">
                            <i class="fa fa-align-left"></i>
                            Menu
                        </button>
                        <button class="btn btn-default d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}">Voltar para o site</a></li>
                                <li class="nav-item"> <a class="nav-link" href="">Minha conta</a></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>                           
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>


                <!-- End banner Area -->
                <section class="sample-text-area">
                    <div class="container">                       
                        @yield('content')
                    </div>
                </section>
                <!-- End banner Area -->


            </div>
        </div>

        <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/easing.min.js') }}"></script>
        <script src="{{ asset('js/hoverIntent.js') }}"></script>
        <script src="{{ asset('js/superfish.min.js') }}"></script>
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/jquery.tabs.min.js') }}"></script>
        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('js/waypoints.min.js') }}"></script>
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('js/simple-skillbar.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/mail-script.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>	
        <script type="text/javascript">
                                           $(document).ready(function () {
                                               $('#sidebarCollapse').on('click', function () {
                                                   $('#sidebar').toggleClass('active');
                                               });
                                           });
        </script>


    </body>
</html>
