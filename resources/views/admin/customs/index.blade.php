@extends('layouts.admin')

@section('content')
<h1 >{{$title}}</h1>
<a href="{{route('customs.create')}}" class="btn btn-primary">Adicionar</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tamanho</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customs as $custom)
        <tr>
            <th scope="row">{{$custom->id}}</th>
            <td><a href="{{route('customs.show',$custom->id)}}">{{$custom->tamanho}}</a></td>
            <td>                
                <a href="{{route('customs.show',$custom->id)}}" title="Visualizar" class="actions view"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a href="{{route('customs.edit',$custom->id)}}" title="Editar dados"class="actions edit"><span class="glyphicon glyphicon-pencil"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $customs->links() !!}
@endsection
