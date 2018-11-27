@extends('layouts.admin')

@section('content')
<h1 >Projetos</h1>

<div class="col-lg-6">
    <br>
    <a href="{{route('projetos.create')}}" class="btn btn-primary">Adicionar Projeto</a>
</div>
<div class="col-lg-6">
    <br>
    <form action="{{url('admin/projetos/busca')}}" method="post">
        {!! csrf_field()!!}   
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Pesquisar por titulo...">
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
                <th scope="col">SOLICITAÇÃO</th>
                <th scope="col">TÍTULO</th>
                <th scope="col">CLIENTE</th>
                <th scope="col">STATUS</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projetos as $projeto)
            <tr>
                <th scope="row">{{$projeto->id}}</th>
                <td>{{$projeto->created_at->format('d/m/Y H:m ')}}</td>
                <td><a href="{{route('projetos.show',$projeto->id)}}">{{$projeto->titulo}}</a></td>
                <td><a href="{{route('clientes.show',$projeto->user->id)}}">{{$projeto->user->name}}</a></td>
                <td>
                    <form class="form" method="post" action="{{route('clientes.projetos.avancar',$projeto->id)}}">
                        {!! method_field('PUT')  !!}
                        {!! csrf_field()!!}   

                        <select name='status_projs_id' id="status_projs_id" class="" data-show-subtext="true" data-live-search="true">
                            @foreach($status as $statu)
                            @if ($statu->id == $projeto->status_projs_id)
                            <option data-subtext="(Fase: {{$statu->ordem}})"  value="{{$statu->id or old('status_projs_id')}}" selected>{{$statu->nome}}</option>
                            @else
                            <option data-subtext="(Fase: {{$statu->ordem}})"  value="{{$statu->id or old('status_projs_id')}}">{{$statu->nome}}</option>
                            @endif
                            @endforeach
                        </select>
                        <button title="Avançar status" type="submit" class="btn btn-info">Ok</button>

                    </form>

                </td>
                <td>  
                    <a href="{{route('projetos.edit',$projeto->id)}}" title="Editar dados" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></a>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{!! $projetos->links() !!}
@endsection
