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
                <th scope="col">PAGO</th>
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
                    @if($projeto->pago == false)
                    <form class="form" method="post" action="{{route('projetos.confirmar.pagamento',$projeto->id)}}">
                        {!! method_field('PUT')  !!}
                        {!! csrf_field()!!}   
                        <button type="submit" href="" class="btn btn-success">Confirmar pagamento</button>
                    </form>

                    @else
                    Pagamento confirmado!
                    @endif
                </td>
                <td>  
                    <form class="form" method="post" action="{{route('projetos.destroy',$projeto->id)}}">
                        {!! method_field('DELETE')  !!}
                        {!! csrf_field()!!}  
                        <a href="{{route('projetos.edit',$projeto->id)}}" title="Editar dados" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#teste" data-userid="<?php echo $projeto->id ?>">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </form>


                </td>
            </tr>

            <!-- Modal -->
        <div class="modal fade" id="teste" tabindex="-1" role="dialog" aria-labelledby="exampleMotedalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Deletar projeto?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Deseja realmente deletar este projeto <b>{{$projeto->titulo}}</b>? 

                    </div>
                    <div class="modal-footer">
                        <form class="form" method="post" action="{{route('projetos.destroy',$projeto->id)}}">
                            {!! method_field('DELETE')  !!}
                            {!! csrf_field()!!}  
                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> DELETAR</span></button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </tbody>
    </table>
</div>

{!! $projetos->links() !!}




@endsection
