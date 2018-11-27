@extends('layouts.admin')

@section('content')
<a href="{{route('statusProjs.index')}}" class="btn btn-primary">Voltar</a>

<h1 >{{$tituloPage }} </h1>

<h4><b>Nome: </b>{{$statusProj->nome}}</h4>
<h4><b>Sigla: </b>{{$statusProj->ordem}}</h4>
<h4><b>Porcentagem: </b>{{$statusProj->porcentagem}}%</h4>


@if(isset($errors)&& count ($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif
        
        

<form class="form" method="post" action="{{route('statusProjs.destroy',$statusProj->id)}}">
    {!! method_field('DELETE')  !!}
    {!! csrf_field()!!}   
    
    <button type="submit" class="btn btn-danger">Deletar</button>
    
    <a href="{{route('statusProjs.edit',$statusProj->id)}}" title="Editar dados" class="btn btn-success">Alterar</a>
</form>
@endsection
