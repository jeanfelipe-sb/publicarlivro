@extends('layouts.site')
@section('title', 'Serviços inclusos')

@section('content')
<!-- start banner Area -->
<section class="about-banner">
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Serviços inclusos	 			
                </h1>	
            </div>	
        </div>
    </div>
</section>
<!-- End banner Area -->	

<!-- Start services Area -->
<section class="services-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content  col-lg-7">
                <div class="title text-center">
                    <h4 class="mb-10">Todos os nossos pacotes incluem os seguintes serviços</h4>
                </div>
            </div>
        </div>						
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="single-services">
                    <span class="lnr lnr-book"></span>
                    <a href="#"><h4>Design De Capa</h4></a>
                    <p>
                        Sua obra terá uma capa criada de forma exclusiva, oferencendo uma apresentação de qualidade e identidade visual.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-services">
                    <span class="lnr lnr-laptop-phone"></span>
                    <a href="#"><h4>Diagramação</h4></a>
                    <p>
                        Faremos todas as adaptações necessárias para que sua obra esteja de acordo com sua necessidade. Seja dentro das normas da ABNT para produções cinetíficas, ou dando um ar alegre e fácil em sua obra infantil.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-services">
                    <span class="lnr lnr-highlight"></span>
                    <a href="#"><h4>Registro de ISBN</h4></a>
                    <p>
                        Sua obra registrada no ISBN, sistema que identifica numericamente os livros segundo o título, o autor, o país e a editora, individualizando-os inclusive por edição.
                    </p>
                </div>	
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-services">
                    <span class="lnr lnr-apartment"></span>
                    <a href="#"><h4>Biblioteca Nacional</h4></a>
                    <p>
                        Sua obra enviada para a Biblioteca Nacional, segundo as Leis N. 10.994/2004 e 12.192/2010, cujo objetivo é assegurar a coleta, a guarda e a difusão da produção intelectual brasileira.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-services">
                    <span class="lnr lnr-tablet"></span>
                    <a href="#"><h4>Livro Digital</h4></a>
                    <p>
                        Além dos exemplares impressos, sua obra será disponibilizada em uma versão digital (ePUB), possibilitando a leitura em dispositivos eletrônicos.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-services">
                    <span class="lnr lnr-rocket"></span>
                    <a href="#"><h4>1.000 Pontos De Entrega</h4></a>
                    <p>
                        Contamos com mais de 1.000 balcões de entrega, possibilitando que a retirada de seus exemplares possa ocorrer sempre em um lugar próximo de você.
                    </p>
                </div>				
            </div>														
        </div>
    </div>	
    <div class="row">
        <div class="col-12">
            <div style="padding: 40px;"class="title text-center">
                <a href="{{route('publique')}}" class="genric-btn primary ">Publique agora!</a>

            </div>
        </div>
    </div>
</section>
<!-- End services Area -->	
@endsection
