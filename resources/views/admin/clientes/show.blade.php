@extends('layouts.admin')

@section('content')
<a href="{{route('clientes.index')}}" class="btn btn-primary">Voltar</a>

<h1 >{{$tituloPage }} {{$cliente->name}}</h1>
<h4><b>Sobrenome: </b>{{$cliente->sobrenome}}</h4>
<h4><b>CPF: </b>{{$cliente->cpf}}</h4>
<h4><b>E-mail: </b>{{$cliente->email}}</h4>
<h4><b>Telefone: </b>{{$cliente->telefone}}</h4>
<h4><b>CEP: </b>{{$cliente->cep}}</h4>
<h4><b>Cidade: </b>{{$cliente->cidade}}</h4>
<h4><b>Estado: </b>{{$cliente->estado}}</h4>

@if(isset($errors)&& count ($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif



<form class="form" method="post" action="{{route('clientes.destroy',$cliente->id)}}">
    {!! method_field('DELETE')  !!}
    {!! csrf_field()!!}   

    <button type="submit" class="btn btn-danger">Deletar</button>  
    <a href="{{route('clientes.edit',$cliente->id)}}" title="Editar dados" class="btn btn-success">Alterar</a>

</form>
<br>

@endsection
