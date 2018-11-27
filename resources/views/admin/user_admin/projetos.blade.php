@extends('layouts.admin')

@section('content')
<a href="{{route('clientes.index')}}" class="btn btn-primary">Voltar</a>

<h1 >Projetos de {{$user->name}}</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">TÍTULO</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projetos as $projeto)
        <tr>
            <th scope="row">{{$projeto->id}}</th>
            <td><a href="{{route('projetos.show',$projeto->id)}}">{{$projeto->titulo}}</a></td>
            <td>                
                <a href="{{route('projetos.show',$projeto->id)}}" title="Visualizar" class="actions view"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a href="{{route('projetos.edit',$projeto->id)}}" title="Editar dados"class="actions edit"><span class="glyphicon glyphicon-pencil"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
