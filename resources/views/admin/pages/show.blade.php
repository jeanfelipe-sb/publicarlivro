@extends('layouts.admin')

@section('content')
<a href="{{route('pages.index')}}" class="btn btn-primary">Voltar</a>

<h1 >{{$tituloPage }} {{$page->titulo}}</h1>
<h4><b>Slug: </b>{{$page->slug}}</h4>
<p><b>Conteúdo: </b>{!!$page->content!!}</p>

@if(isset($errors)&& count ($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif
        
        

<form class="form" method="post" action="{{route('pages.destroy',$page->id)}}">
    {!! method_field('DELETE')  !!}
    {!! csrf_field()!!}   
    
    <button type="submit" class="btn btn-danger">Deletar</button>
</form>
@endsection
