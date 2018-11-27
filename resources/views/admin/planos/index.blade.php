@extends('layouts.admin')

@section('content')
<h1 >Planos</h1>
<a href="{{route('planos.create')}}" class="btn btn-primary">Adicionar Plano</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">SIGLA</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($planos as $plano)
        <tr>
            <th scope="row">{{$plano->id}}</th>
            <td><a href="{{route('planos.show',$plano->id)}}">{{$plano->nome}}</a></td>
            <td><a href="{{route('planos.show',$plano->id)}}">{{$plano->sigla}}</a></td>
            <td>                
                <a href="{{route('planos.show',$plano->id)}}" title="Visualizar" class="actions view"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a href="{{route('planos.edit',$plano->id)}}" title="Editar dados"class="actions edit"><span class="glyphicon glyphicon-pencil"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $planos->links() !!}
@endsection
