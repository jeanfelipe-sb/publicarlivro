@extends('layouts.site')
@section('title', 'Quem somos')


@section('content')
<!-- start banner Area -->
<section class="about-banner">
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Quem somos?				
                </h1>	
            </div>	
        </div>
    </div>
</section>
<!-- End banner Area -->	

<!-- Start home-about Area -->
<section class="home-about-area" >
    <div class="container">
        <div class="row align-items-center justify-content-between">                   
            <div class="col-lg-5 col-md-6 home-about-right">
                <br>
                <h1 class="text-uppercase">Nosso propósito</h1>
                <p style="font-size: 15px">
                <p>
                    O Meu Livro Publicado é um site desenvolvido pela editora Collaborativa, uma editora pensada para você que quer tirar do rascunho sua ideia, seu projeto ou seu livro e compartilhar seus conhecimentos no mundo físico e digital com uma boa apresentação de  capa, bem revisado, bem diagramado, com registro de ISBN e uma cópia na Biblioteca Nacional.
                </p>
                <p>
                    <b>
                        Nosso propósito é popularizar a distribuição do conhecimento, da cultura, da arte e da criatividade priorizando a colaboração e o compartilhamento de ideias entre pessoas que queiram viabilizar a publicação do seu livro num preço justo e acessível.
                    </b>
                </p>

                <p>
                    Acreditamos na empatia, na força da colaboração e num mudo co‐criado. Nosso objetivo vai além da assistência aos nossos autores. Temos um ideal maior, que visa desenvolver uma rede interativa, na qual o conhecimento produzido será distribuído não só ao público consumidor de livros, mas também divulgado e apoiado por empresas ligadas à área.
                </p>
                <p>
                    Venha ser Collaborativo!
                </p>

                <p>
                    Publique conosco e torne‐se parte da inovação do mercado editorial!

                </p>

            </div>
            <div class="col-lg-6 col-md-6 home-about-left">
                <br>
                <br>
                <img class="img-fluid img-fluid-home img-pequena " height="30px"  src="{{URL::asset('img/home.png')}}" alt="">
                <img class="img-fluid" src="img/book.png" alt="">
            </div>


            <br>
            <h1 class="text-uppercase text-center">A Equipe de Trabalho</h1>
            <p style="font-size: 15px">
            <p>
                A equipe de trabalho do site Meu Livro Publicado e da Editora Collaborativa é formado por três amigos que ao longo dos anos trabalharam no mercado editorial, e sempre tiveram a vontade de fazer com a produção de um livro fosse o mais simples possível e principalmente a preços justos.
                <br>
                <br>
                Cada um trouxe para esse lindo projeto, seus conhecimentos;
            </p>
            <p>
            <div class="col-md-3 text-center photo">                   
                <img class="img-fluid img-fluid-home img-pequena " height="30px"  src="{{URL::asset('img/man.jpg')}}" alt="">
            </div>
            <div class="col-md-9 ">
                <b style="font-size: 20px">Sergio Vieira</b>
                <br>
                <p>
                    atuou por mais de 10 anos nas áreas de gestão de logística e qualidade de material gráfico e no acompanhamento na produção, revisão e diagramação de livros. Ele é o cara que cuida com todo o carinho do atendimento, produção e entrega dos livros dos nossos autores. 
                </p>
            </div>
            </p>

            <div class="col-md-3 text-center photo">                   
                <img class="img-fluid img-fluid-home img-pequena " height="30px"  src="{{URL::asset('img/man.jpg')}}" alt="">
            </div>
            <div class="col-md-9 ">
                <b style="font-size: 20px">Christofer Scorzato</b>
                <br>
                <p>
                    Atuou por mais de 15 anos na gestão de produção de parques gráficos, cuidando de todo o ciclo; da entrada do pedido na gráfica até seu despacho para clientes. Ele é o cara que cuida com a máxima atenção da produção nas gráficas, conhecendo todos os tipos de papéis disponíveis e mantendo o padrão de qualidade contratada. 
                </p>
            </div>
            <div class="col-md-3 text-center photo">                   
                <img class="img-fluid img-fluid-home img-pequena " height="30px"  src="{{URL::asset('img/man.jpg')}}" alt="">
            </div>
            <div class="col-md-9 ">                  
                <b style="font-size: 20px">Marcelo Figueiral</b>
                <br>
                <p>
                    atuou por mais de 20 anos em áreas de negócios nas formulações de estratégias de novos projetos para novos mercados. Autor de 02 livros conhece de perto a dificuldade para tirar do papel projetos e transformar em livros. Ele é o cara que cuida da experiência de cada autor ao longo do projeto de publicação, acompanhando cada etapa do projeto para que saia de acordo com o que cada autor quer.         
                </p>
            </div>
        </div> 
        <div class="text-center">
            <br><br>
            <a href="{{route('publique')}}" class="genric-btn primary ">Publique agora!</a>
        </div>
    </div>	
    <br>
    <br>
</section>

@endsection
@push('scripts')
<link rel="stylesheet" href="{{asset('css/about.css')}}">
@endpush