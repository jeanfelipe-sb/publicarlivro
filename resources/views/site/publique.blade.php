@extends('layouts.site')
@section('title', 'Publique conosco')

@section('content')
<!-- start banner Area -->
<section class="about-banner">
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    {{$titulo}}				
                </h1>	
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
                        <li>Revisão de Texto</li>									
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
        <HR>

</section>
<!-- End price Area -->	
<!-- Start faq Area -->
<section class="faq-area pb-120">
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
<!-- End faq Area -->

@endsection
