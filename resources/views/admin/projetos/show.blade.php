@extends('layouts.admin')

@section('content')
<a href="{{route('projetos.index')}}" class="btn btn-primary">Voltar</a>

<h1 >{{$tituloPage }} </h1>
@if($projeto->original_file != null)
<h4><b>Arquivo do original: </b></h4>

<a class="btn btn-primary" href="{{ url("admin/download/{$projeto->original_file}" )}}" target="_blank">
    Baixar arquivo
</a>
<a class="btn btn-danger" href="{{route('deleteorigialfile',$projeto->id)}}" >
    Deletar arquivo
</a>
<br>
<br>
@endif
<h4><b>Título: </b>{{$projeto->titulo}}</h4>
<h4><b>Autores: </b>{{$projeto->autores}}</h4>
<h4><b>Prazo: </b>{{$projeto->prazo}}</h4>
<h4><b>Páginas: </b>{{$projeto->paginas}}</h4>
<h4><b>Formato: </b>{{$projeto->tamanho}}</h4>
<h4><b>Pagamento confirmado?: </b>{{ $projeto->pago ? 'Sim' : 'Não'}}</h4>
<h4><b>Exemplares: </b>{{$projeto->exemplares}}</h4>
<h4><b>Preço sugerido: </b>R$ {{$projeto->preco_sugerido}}</h4>
<h4><b>Preço total: </b>R$ {{$projeto->valor}}</h4>
<h4><b>Endereco de entrega: </b>{{$projeto->endereco_entrega}}</h4>
<h4><b>Status do projeto: </b>{{$projeto->StatusProj->nome}}</h4>
<h4><b>Cliente: </b><a href="{{route('clientes.show',$projeto->user->id)}}">{{$projeto->user->name}}</a></h4>
<h4><b>Observação: </b>{{$projeto->observacao}}</h4>
<h4><b>Notas: </b>{{$projeto->notas}}</h4>

@if(isset($errors)&& count ($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif



<form class="form" method="post" action="{{route('projetos.destroy',$projeto->id)}}">
    {!! method_field('DELETE')  !!}
    {!! csrf_field()!!}   

    <button type="submit" class="btn btn-danger">Deletar</button>

    <a href="{{route('projetos.edit',$projeto->id)}}" title="Editar dados" class="btn btn-success">Alterar</a>
</form>
@endsection
