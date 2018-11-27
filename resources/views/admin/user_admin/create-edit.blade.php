@extends('layouts.admin')

@section('content')
<a href="{{route('users-admin.index')}}" class="btn btn-primary">Voltar</a>

<h1 >{{$tituloPage}}</h1>
@if(isset($errors)&& count ($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

@if(isset($admin))
<form class="form" method="post" action="{{route('users-admin.update',$admin->id)}}">
    {!! method_field('PUT')!!}
    @else
    <form class="form" method="post" action="{{route('users-admin.store')}}">
        @endif
        {!! csrf_field()!!}
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Nome</label>
            <input name="name" type="text" value="{{$admin->name or old('name')}}" class="form-control" placeholder="Defina o nome do admin">
        </div> 
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">E-mail</label>
            <input name="email" type="email" required value="{{$admin->email or old('email')}}" class="form-control" placeholder="Defina o e-mail do admin">
        </div> 
        @if(!isset($admin))
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Senha</label>
            <input name="password" type="password" required value="{{old('password')}}" class="form-control" placeholder="Defina a senha do admin">
        </div>   
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Confirmar Senha</label>
            <input name="password_confirmation" type="password" required  class="form-control" placeholder="Conforme a senha do admin">
        </div> 
        @endif
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>



    @endsection
