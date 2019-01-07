<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="img/fav.png">
        <!-- Author Meta -->
        <meta name="author" content="colorlib">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{!! asset('img/logo-home.png') !!}"/>

        <!-- Site Title -->
        <title>Meu Livro Publicado - @yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!--
        CSS
        ============================================= -->

        <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">			
        <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">							
        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">			
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">			
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        @stack('scripts')
    </head>
    <body>	
        <header id="header">
            <div class="container main-menu">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <a href="{{route('home')}}"><img src="{{ asset('img/logo.png')}}" alt="" title="" /></a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('about')}}">Quem Somos</a></li>
                            <li><a href="{{route('servicos')}}">Serviços inclusos</a></li>	
                            <li><a href="{{route('publique')}}">Publique Agora</a></li>
                            <li><a href="{{route('contato')}}">Contato</a></li>	
                            @guest
                            <li><a href="{{ route('login') }}">Entrar</a></li> 
                            @else
                            <li  class="menu-has-children">
                                <a href="#"  >
                                    <b>Olá, {{ Auth::user()->name }}!</b>
                                </a>

                                <ul>
                                    <li><a href="{{ route('painel.home') }}">Meu Painel</a></li>
                                    <li><a href="{{ route('painel.minha-conta') }}">Minha conta</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>  
                            @endguest 
                        </ul>
                    </nav><!-- #nav-menu-container -->		    		
                </div>
            </div>
        </header><!-- #header -->



        @yield('content')

        <!-- start footer Area -->
        <footer class="footer-area section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Meu livro publicado</h4>
                            <p>
                                Editora Collaborativa
                            </p>
                            <p class="footer-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="single-footer-widget">

                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                        <div class="single-footer-widget">
                            <h4>Siga-nos</h4>
                            <div class="footer-social d-flex align-items-center">
                                <a href="#"><i class="fa fa-3x fa-facebook"></i></a>                                
                                <a href="#"><i class="fa fa-3x fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer Area -->		


        <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset( 'js/popper.min.js') }}"></script>
        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>			
        <script src="{{ asset('js/easing.min.js') }}"></script>			
        <script src="{{ asset('js/hoverIntent.js') }}"></script>
        <script src="{{ asset('js/superfish.min.js') }}"></script>	
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>	
        <script src="{{ asset('js/jquery.tabs.min.js') }}"></script>						
        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>	
        <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>			
        <script src="{{ asset('js/waypoints.min.js') }}"></script>
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('js/simple-skillbar.js') }}"></script>							
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>							
        <script src="{{ asset('js/mail-script.js') }}"></script>	
        <script src="{{ asset('js/main.js') }}"></script>	
    </body>
</html>