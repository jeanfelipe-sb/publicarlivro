@extends('layouts.painel')
@section('title', 'Meus projetos')

@section('content')

<section >
    <div class="container">	
        <h3 class="text-heading">Andamento do projeto</h3>
        <div class="single-skill">
            <p>
                Completo {{$projeto->statusProj->porcentagem}}%
            </p>
            <div class="skill" data-width="{{$projeto->statusProj->porcentagem}}"></div>
        </div>
        <p class="sample-text">
            <br/>
            <b>FASE ATUAL DO PROJETO:</b> {{$projeto->statusProj->nome}}
            <br/>
            <b>PRÓXIMA FASE:</b> 
            @if($proxima_fase == null)           
            Completo
            @else
            {{$proxima_fase}}
            @endif
            <br/>
            <br>
            <b>Título:</b> {{$projeto->titulo}}
            <br/>
            <b>Autores:</b> {{$projeto->autores}}
            <br/>
            <b>Páginas:</b> {{$projeto->paginas}}
            <br/>
            <b>Páginas Coloridas:</b> {{$projeto->pc}}
            <br/>
            <b>Páginas Preto e Branco:</b> {{$projeto->pb}}
            <br/>
            <b>Formato:</b> {{$projeto->tamanho}}
            <br/>
            <b>Exemplares:</b> {{$projeto->exemplares}}
            <br/>
            <b>Preço total:</b> R$ {{number_format($projeto->valor, 2, ',', '.')}}
            <br/>
            <b>Observação:</b> {{$projeto->observacao}}
        </p>
    </div>
</section>

@endsection
