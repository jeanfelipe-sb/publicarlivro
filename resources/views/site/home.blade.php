@extends('layouts.site')


@section('content')
<!-- start banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-between">
            <div class="col-lg-6 col-md-6 banner-left">
                <h6>Meu Livro Publicado </h6>
                <h1>Tire sua ideia do papel</h1>
                <p>
                    <b>Compartilhe sua obra</b> no mundo físico e digital. A sua obra ao alcance de todos!
                </p>
                <a href="{{route('publique')}}" class="primary-btn text-uppercase">Publique agora!</a>
            </div>
            <div class="col-lg-6 col-md-6 banner-right d-flex align-self-end">
                <img class="img-fluid img-fluid-home img-pequena "  src="{{URL::asset('img/home2.png')}}" alt="">
            </div>
        </div>
    </div>					
</section>
<!-- End banner Area -->
<!-- Start price Area -->
<section class="price-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Escolha seu plano</h1>
                    <p>Temos os melhores planos de publicação para sua obra ou projeto</p>
                </div>
            </div>
        </div>	
        <div class="row">
            @foreach($planos as $plano)
            <div class="col-lg-3 col-md-6 single-price">
                <div class="top-part">
                    <h1 class="package-no">{{$plano->sigla}}</h1>
                    <h4>{{$plano->nome}}</h4>
                    <!--<p class="mt-10">For the individuals</p>-->
                </div>
                <div class="package-list">
                    <ul>
                        <li>Até {{$plano->paginas}} páginas
                            @if($plano->pg_coloridas == 0)
                            preto e branco
                            @else
                            coloridas
                            @endif
                        </li>
                        <li>{{$plano->exemplares}} exemplares para o autor</li>
                        <li>Criação Capa + Diagramação</li>	
                        <li>Formato {{$plano->tamanho}} cm</li>									
                        <li>Registro de ISBN</li>									
                        <li>Cópia na Biblioteca Nacional</li>
                    </ul>
                </div>
                <div class="bottom-part">
                    {{$plano->qtd_parcelas}} x de
                    <h1>R$ {{number_format($plano->valor_parcelas, 2, ',', '.')}}</h1>
                    <a class="price-btn text-uppercase" href="{{route('painel.projetos.create',$plano)}}">Publicar Agora</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <div style="padding: 40px;"class="title text-center">
                    <h1 class="mb-10">Personalize seu plano</h1>
                    <p>Crie seu plano conforme a sua necessidade</p>
                    <a href="{{route('site.custom')}}" class="genric-btn primary ">Personalize</a>

                </div>
            </div>
        </div>
    </div>
    <HR>
</section>

<!-- Start services Area -->
<section class="services-area">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content  col-lg-7">
                <div class="title text-center">
                    <h1>Serviços inclusos</h1>
                    <br>                    
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
    <hr>
</section>
<!-- End services Area -->	

<!-- End price Area -->	
<!-- Start faq Area -->
<section class="faq-area pb-120 section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Perguntas Frequentes</h1>
                    <p>When someone does something that they know that they shouldn’t do, did they really have a choice. Maybe what I mean to say is did they really have a chance. You can take two people.</p>
                </div>
            </div>
        </div>						
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <dl class="accordion">
                    <dt>
                        <a href="">"Meu Livro Publicado" é uma gráfica?</a>
                    </dt>
                    <dd>
                        Não! Somos uma editora. Cuidamos de tudo para você, desde a elaboração da capa, diagramação até o registro de ISBN e distribuição.
                    </dd>
                    <dt>
                        <a href="">Tenho porcentagem nas vendas nas livrarias?</a>
                    </dt>
                    <dd>
                        Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. leo quam aliquet diam, congue laoreet elit metus eget diam.
                    </dd>
                    <dt>
                        <a href="">Posso publicar um projeto?</a>
                    </dt>
                    <dd>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Proin ac metus diam.
                    </dd>
                    <dt>
                        <a href="">Do Your Self Realizations Quickly Fade</a>
                    </dt>
                    <dd>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Proin ac metus diam.
                    </dd>
                    <dt>
                        <a href="">Success Steps For Your Personal Or Business Life</a>
                    </dt>
                    <dd>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. Proin ac metus diam.
                    </dd>
                </dl>

            </div>
        </div>
    </div>	
</section>

@endsection
