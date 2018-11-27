@extends('layouts.admin')

@section('content')
<a href="{{route('customs.index')}}" class="btn btn-primary">Voltar</a>

<h1 >{{$tituloPage}}</h1>
@if(isset($errors)&& count ($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

@if(isset($custom))
<form class="form" method="post" action="{{route('customs.update',$custom->id)}}">
    {!! method_field('PUT')!!}
    @else
    <form class="form" method="post" action="{{route('customs.store')}}">
        @endif
        {!! csrf_field()!!}

        <div class="form-group">
            <label for="exampleInputEmail1">Tamanho</label>
            <input name="tamanho" type="text" required value="{{$custom->tamanho or old('tamanho')}}" class="form-control" placeholder="Defina o tamanho">
        </div> 
        <div class="form-group">
            <label for="exampleInputEmail1">Preço da Página Preto e branco</label>
            <input name="pb" type="number" required step=".01" min="0" value="{{$custom->pb or old('pb')}}" class="form-control" placeholder="Defina o preço">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Preço da Página colorida</label>
            <input name="pc" type="number" required step=".01" min="0" value="{{$custom->pc or old('pc')}}" class="form-control" placeholder="Defina o preço">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Preço da capa</label>
            <input name="capa" type="number" required step=".01" min="0" value="{{$custom->capa or old('capa')}}" class="form-control" placeholder="Defina o preço">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Preço da editoração</label>
            <input name="editoracao" type="number" required step=".01" min="0" value="{{$custom->editoracao or old('editoracao')}}" class="form-control" placeholder="Defina o preço">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    @endsection
