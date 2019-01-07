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
            @if($projeto->pago == 0)
            <a href="{{route('site.pagamento',$projeto->id)}}" class="btn btn-success" title="Realizar pagamento" class="actions view">Realizar Pagamento</a>
            @endif
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
            <br><br>
            @if($projeto->original_file != null)
            <b>Arquivo do original: </b>
            <a class="btn btn-primary" href="{{ url("admin/download/{$projeto->original_file}" )}}" target="_blank">
                Baixar arquivo
            </a>
            <br>
            <br>
            @endif
        </p>
    </div>
</section>

@endsection
