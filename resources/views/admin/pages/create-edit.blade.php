@extends('layouts.admin')

@section('content')
<a href="{{route('pages.index')}}" class="btn btn-primary">Voltar</a>

<h1 >{{$tituloPage}}</h1>
@if(isset($errors)&& count ($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

@if(isset($page))
<form class="form" method="post" action="{{route('pages.update',$page->id)}}">
    {!! method_field('PUT')!!}
@else
    <form class="form" method="post" action="{{route('pages.store')}}">
@endif
        {!! csrf_field()!!}
        <div class="form-group">
            <label for="exampleInputEmail1">Título</label>
            <input name="titulo" type="text" value="{{$page->titulo or old('titulo')}}" class="form-control" placeholder="Defina o título da pánina">
        </div> 
        <div class="form-group">
            <label for="exampleInputEmail1">Slug</label>
            <input name="slug" type="text" value="{{$page->slug or old('slug')}}" class="form-control" placeholder="Defina o slug da pánina">
        </div>  
        <div class="form-group">
            <label for="exampleTextarea">Conteúdo</label>
            <textarea name="content" class="form-control"  id="content" rows="3">{{$page->content or old('content')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    @endsection
