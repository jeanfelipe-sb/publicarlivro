@extends('layouts.admin')

@section('content')
<a href="{{route('statusProjs.index')}}" class="btn btn-primary">Voltar</a>

<h1 >{{$tituloPage}}</h1>
@if(isset($errors)&& count ($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

@if(isset($statusProj))
<form class="form" method="post" action="{{route('statusProjs.update',$statusProj->id)}}">
    {!! method_field('PUT')!!}
    @else
    <form class="form" method="post" action="{{route('statusProjs.store')}}">
        @endif
        {!! csrf_field()!!}

        <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input name="nome" type="text" required value="{{$statusProj->nome or old('nome')}}" class="form-control" placeholder="Defina o nome status">
        </div> 
        <div class="form-group">
            <label for="exampleInputEmail1">Ordem</label>
            <input name="ordem" type="number" required min="0" value="{{$statusProj->ordem or old('ordem')}}" class="form-control" placeholder="Defina a ordem do status">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Porcentagem</label>
            <input name="porcentagem" type="number" required min="1" value="{{$statusProj->porcentagem or old('porcentagem')}}" class="form-control" placeholder="Defina a porcentagem do status">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    @endsection
