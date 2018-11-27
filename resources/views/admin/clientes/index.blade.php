@extends('layouts.admin')

@section('content')
<h1 >{{$title}}</h1>
<div class="col-lg-6">
    <br>
    <a href="{{route('clientes.create')}}" class="btn btn-primary">Adicionar Cliente</a>
</div>
<div class="col-lg-6">

    <br>
    <form action="{{url('admin/clientes/busca')}}" method="post">
        {!! csrf_field()!!}   
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Pesquisar por nome...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Ok</button>
            </span>
        </div><!-- /input-group -->
    </form>
</div>
<div class="col-lg-12">
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td><a href="{{route('clientes.show',$user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>                
                    <a href="{{route('admin.clientes.senha',$user->id)}}" title="Alterar senha" class="btn btn-warning"><i class="fa fa-unlock"></i></a>
                    <a href="{{route('clientes.edit',$user->id)}}" title="Editar dados" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="{{route('clientes.projetos',$user->id)}}" title="Editar dados" class="btn btn-success">Projetos</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{!! $users->links() !!}
@endsection
