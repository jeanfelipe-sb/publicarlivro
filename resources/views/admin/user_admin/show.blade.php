@extends('layouts.admin')

@section('content')
<a href="{{route('users-admin.index')}}" class="btn btn-primary">Voltar</a>
@if(isset($errors)&& count ($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

<h1 >{{$tituloPage }} </h1>
<h4><b>Nome: </b>{{$admin->name}}</h4>
<h4><b>E-mail: </b>{{$admin->email}}</h4>






<form class="form" method="post" action="{{route('users-admin.destroy',$admin->id)}}">
    {!! method_field('DELETE')  !!}
    {!! csrf_field()!!}   

    <button type="submit" class="btn btn-danger">Deletar</button>  
    <a href="{{route('users-admin.edit',$admin->id)}}" title="Editar dados" class="btn btn-success">Alterar</a>

</form>
<br>

@endsection
