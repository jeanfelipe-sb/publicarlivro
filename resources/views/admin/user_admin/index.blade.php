@extends('layouts.admin')

@section('content')
<h1 >{{$title}}</h1>
<div class="col-lg-6">
    <br>
    <a href="{{route('users-admin.create')}}" class="btn btn-primary">Adicionar Cliente</a>
</div>
<div class="col-lg-6">

    <br>
    <form action="{{url('admin/users-admin/busca')}}" method="post">
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
            @foreach($userAdmins as $userAdmin)
            <tr>
                <th scope="row">{{$userAdmin->id}}</th>
                <td><a href="{{route('users-admin.show',$userAdmin->id)}}">{{$userAdmin->name}}</a></td>
                <td>{{$userAdmin->email}}</td>
                <td>                
                    <a href="{{route('admin.users-admin.senha',$userAdmin->id)}}" title="Alterar senha" class="btn btn-warning"><i class="fa fa-unlock"></i></a>
                    <a href="{{route('users-admin.edit',$userAdmin->id)}}" title="Editar dados" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{!! $userAdmins->links() !!}
@endsection
