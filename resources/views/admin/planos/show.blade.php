@extends('layouts.admin')

@section('content')
<a href="{{route('planos.index')}}" class="btn btn-primary">Voltar</a>

<h1 >{{$tituloPage }} {{$plano->nome}}</h1>
<h4><b>Sigla: </b>{{$plano->sigla}}</h4>
<h4><b>Páginas: </b>{{$plano->paginas}}</h4>
<h4><b>Páginas Coloridas: </b>{{$plano->pc}}</h4>
<h4><b>Páginas Preto e Branco: </b>{{$plano->pb}}</h4>
<h4><b>Formato: </b>{{$plano->tamanho}}</h4>
<h4><b>Coloridas?: </b>{{ $plano->pg_coloridas ? 'Sim' : 'Não'}}</h4>
<h4><b>Exemplares: </b>{{$plano->exemplares}}</h4>
<h4><b>Quantidade parcelas: </b>{{$plano->qtd_parcelas}}</h4>
<h4><b>Valor parcelas: </b>{{$plano->valor_parcelas}}</h4>
<h4><b>Preço total: </b>{{$plano->preco_total}}</h4>
<h4><b>Prazo: </b>{{$plano->prazo}} dias</h4>


@if(isset($errors)&& count ($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif
        
        

<form class="form" method="post" action="{{route('planos.destroy',$plano->id)}}">
    {!! method_field('DELETE')  !!}
    {!! csrf_field()!!}   
    
    <button type="submit" class="btn btn-danger">Deletar</button>
    
    <a href="{{route('planos.edit',$plano->id)}}" title="Editar dados" class="btn btn-success">Alterar</a>
</form>
@endsection
