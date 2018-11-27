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
                <h1 class="text-uppercase">Nosso propósito</h1>
                <p style="font-size: 15px">
                    ...popularizar a distribuição do conhecimento, da cultura, da arte e da criatividade, priorizando a colaboração e o compartilhamento de ideias entre pessoas que queiram viabilizar a publicação do seu livro num preço justo e acessível.
                </p>
                <a href="{{route('publique')}}" class="genric-btn primary ">Publique agora!</a>

            </div>
            <div class="col-lg-6 col-md-6 home-about-left">
                <br>
                <br>
                <img class="img-fluid img-fluid-home img-pequena " height="30px"  src="{{URL::asset('img/home.png')}}" alt="">
                <img class="img-fluid" src="img/book.png" alt="">
            </div>

        </div>                
    </div>	
</section>

@endsection
