@extends('layouts.admin')

@section('content')
<h1 >Status de projeto</h1>
<a href="{{route('statusProjs.create')}}" class="btn btn-primary">Adicionar Status de projeto</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">ORDEM</th>
            <th scope="col">PORCENTAGEM</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($statusProjs as $statusProj)
        <tr>
            <th scope="row">{{$statusProj->id}}</th>
            <td><a href="{{route('statusProjs.show',$statusProj->id)}}">{{$statusProj->nome}}</a></td>
            <td><a href="{{route('statusProjs.show',$statusProj->id)}}">{{$statusProj->ordem}}</a></td>
            <td><a href="{{route('statusProjs.show',$statusProj->id)}}">{{$statusProj->porcentagem}}</a></td>
            <td>                
                <a href="{{route('statusProjs.show',$statusProj->id)}}" title="Visualizar" class="actions view"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a href="{{route('statusProjs.edit',$statusProj->id)}}" title="Editar dados"class="actions edit"><span class="glyphicon glyphicon-pencil"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $statusProjs->links() !!}
@endsection
