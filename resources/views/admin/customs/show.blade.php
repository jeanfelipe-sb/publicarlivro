@extends('layouts.admin')

@section('content')
<a href="{{route('customs.index')}}" class="btn btn-primary">Voltar</a>

<h1 >{{$tituloPage }} </h1>

<h4><b>Tamanho: </b>{{$custom->tamanho}}</h4>
<h4><b>Preço Paginas PB: </b>R$ {{number_format($custom->pb, 2, ',', '.')}}</h4>
<h4><b>Preço Paginas Coloridas: </b>R$ {{number_format($custom->pc, 2, ',', '.')}}</h4>
<h4><b>Preço capa: </b>R$ {{number_format($custom->capa, 2, ',', '.')}}</h4>
<h4><b>Preço editoração: </b>R$ {{number_format($custom->editoracao, 2, ',', '.')}}</h4>


@if(isset($errors)&& count ($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif
        
        

<form class="form" method="post" action="{{route('customs.destroy',$custom->id)}}">
    {!! method_field('DELETE')  !!}
    {!! csrf_field()!!}   
    
    <button type="submit" class="btn btn-danger">Deletar</button>
    
    <a href="{{route('customs.edit',$custom->id)}}" title="Editar dados" class="btn btn-success">Alterar</a>
</form>
@endsection
