@extends('layouts.admin')

@section('content')
<a href="{{route('projetos.index')}}" class="btn btn-primary">Voltar</a>

<h1 >{{$tituloPage}}</h1>
@if(isset($errors)&& count ($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

@if(isset($projeto))
<form class="form" method="post" action="{{route('projetos.update',$projeto->id)}}">
    {!! method_field('PUT')!!}
    @else
    <form class="form" method="post" action="{{route('projetos.store')}}">

        @endif
        {!! csrf_field()!!}

        <div class="form-group">
            <label for="exampleInputEmail1">Título</label>
            <input name="titulo" type="text" required min="0" value="{{$projeto->titulo or old('titulo')}}" class="form-control" placeholder="Defina o titulo do projeto">
        </div>  
        <div class="form-group">
            <label for="exampleInputEmail1">Autores</label>
            <input name="autores" type="text" required value="{{$projeto->autores or old('autores')}}" class="form-control" placeholder="Defina o autores do projeto">
        </div> 
        <div class="form-group">
            <label for="exampleInputEmail1">Páginas</label>
            <input name="paginas" type="number" required min="0" value="{{$projeto->paginas or old('paginas')}}" class="form-control" placeholder="Defina a quantidade de páninas">
        </div> 
        <div class="form-group">
            <label for="exampleInputEmail1">Formato</label>
            <input name="tamanho" type="text" required value="{{$projeto->tamanho or old('tamanho')}}" class="form-control" placeholder="Defina o formato do livro">
        </div>  
        <div class="form-group">
            <label for="exampleInputEmail1">Exemplares</label>
            <input name="exemplares" type="number"  required min="0" value="{{$projeto->exemplares or old('exemplares')}}" class="form-control" placeholder="Defina a quantidade de exemplares">
        </div>  
        <div class="form-group">
            <label for="exampleInputEmail1">Preço total</label>
            <input name="valor" type="number" required step=".01" min="0" value="{{$projeto->valor or old('valor')}}" class="form-control" placeholder="Defina o preço total">
        </div>  
        <div class="form-group">
            <label for="exampleInputEmail1">Preço sugerido</label>
            <input name="preco_sugerido" type="number"  step=".01" min="0" value="{{$projeto->preco_sugerido or old('preco_sugerido')}}" class="form-control" placeholder="Defina o preço sugerido">
        </div>  

        <div class="form-group">
            <label for="exampleInputEmail1">Endereço de entrega</label>
            <input name="endereco_entrega" type="text" required value="{{$projeto->endereco_entrega or old('endereco_entrega')}}" class="form-control" placeholder="Defina o endereço de entrega">
        </div> 
        <div class="form-group">
            <label for="exampleInputEmail1">Prazo</label>
            <input name="prazo" type="date"  value="{{$projeto->prazo or old('prazo')}}" class="form-control" placeholder="Defina o prazo de entrega">
        </div> 


        <div class="form-group">
            <label for="exampleInputEmail1">Status</label><br>
            <select name='status_projs_id' class="selectpicker" data-show-subtext="true" data-live-search="true">
                @if(isset($projeto))
                @foreach($status as $statu)
                @if ($statu->id == $projeto->status_projs_id)
                <option data-subtext="(Fase: {{$statu->ordem}})"  value="{{$statu->id or old('status_projs_id')}}" selected>{{$statu->nome}}</option>
                @else
                <option data-subtext="(Fase: {{$statu->ordem}})"  value="{{$statu->id or old('status_projs_id')}}">{{$statu->nome}}</option>
                @endif
                @endforeach
                @else
                @foreach($status as $statu)
                <option data-subtext="(Fase: {{$statu->ordem}})"  value="{{$statu->id or old('status_projs_id')}}">{{$statu->nome}}</option>
                @endforeach
                @endif


            </select>
        </div> 
        <div class="form-group">
            <label for="exampleInputEmail1">Cliente</label><br>
            <select name="user_id" class="selectpicker" data-show-subtext="true" data-live-search="true">
                @if(isset($projeto))
                @foreach($users as $user)
                @if ($user->id == $projeto->user_id)
                <option data-subtext="(ID: {{$user->id}})"  value="{{$user->id or old('user_id')}}" selected>{{$user->name}}</option>
                @else
                <option data-subtext="(ID: {{$user->id}})"  value="{{$user->id or old('user_id')}}">{{$user->name}}</option>
                @endif
                @endforeach
                @else
                @foreach($users as $user)
                <option data-subtext="(ID: {{$user->id}})"  value="{{$user->id or old('user_id')}}">{{$user->name}}</option>
                @endforeach
                @endif

            </select>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="pago" @if (isset ($projeto)&& $projeto->pago == '1') checked @endif>
                   <label class="form-check-label" for="exampleCheck1" >Pagamento confirmado</label>
        </div>
        <br>
        <div class="form-group">
            <label for="exampleTextarea">Observação</label>
            <textarea name="observacao" class="form-control"  id="observacao" rows="3"placeholder="Defina as Observações do projeto">{{$projeto->observacao or old('observacao')}}</textarea>
        </div> <div class="form-group">
            <label for="exampleTextarea">Notas (controle interno)</label>
            <textarea name="notas" class="form-control"  id="notas" rows="3" placeholder="Defina as notas do projeto">{{$projeto->notas or old('notas')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    @endsection
