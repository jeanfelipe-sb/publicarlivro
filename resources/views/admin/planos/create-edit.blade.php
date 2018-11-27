@extends('layouts.admin')

@section('content')
<a href="{{route('planos.index')}}" class="btn btn-primary">Voltar</a>

<h1 >{{$tituloPage}}</h1>
@if(isset($errors)&& count ($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

@if(isset($plano))
<form class="form" method="post" action="{{route('planos.update',$plano->id)}}">
    {!! method_field('PUT')!!}
    @else
    <form class="form" method="post" action="{{route('planos.store')}}">
        @endif
        {!! csrf_field()!!}

        <div class="form-group">
            <label for="exampleInputEmail1">Sigla</label>
            <input name="sigla" type="text" required min="0" value="{{$plano->sigla or old('sigla')}}" class="form-control" placeholder="Defina a sigla do plano">
        </div>  
        <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input name="nome" type="text" required value="{{$plano->nome or old('nome')}}" class="form-control" placeholder="Defina o nome do plano">
        </div> 
        <div class="form-group">
            <label for="exampleInputEmail1">Páginas</label>
            <input name="paginas" type="number" required min="0" value="{{$plano->paginas or old('paginas')}}" class="form-control" placeholder="Defina a quantidade de páninas">
        </div> 
        <div class="form-group">
            <label for="exampleInputEmail1">Páginas Coloridas</label>
            <input name="pc" type="number" required min="0" value="{{$plano->pc or old('pc')}}" class="form-control" placeholder="Defina a quantidade de páninas coloridas">
        </div> 
        <div class="form-group">
            <label for="exampleInputEmail1">Todas Coloridas?</label><br>
            <input name="pg_coloridas"  type="checkbox" @if (isset ($plano)&& $plano->pg_coloridas == '1') checked @endif> Sim
        </div>  
        <div class="form-group">
            <label for="exampleInputEmail1">Formato</label>
            <input name="tamanho" type="text" required value="{{$plano->tamanho or old('tamanho')}}" class="form-control" placeholder="Defina o formato do livro">
        </div>  
        <div class="form-group">
            <label for="exampleInputEmail1">Exemplares</label>
            <input name="exemplares" type="number"  required min="0" value="{{$plano->exemplares or old('exemplares')}}" class="form-control" placeholder="Defina a quantidade de exemplares">
        </div>  
        <div class="form-group">
            <label for="exampleInputEmail1">Preço total</label>
            <input name="preco_total" type="number" required step=".01" min="0" value="{{$plano->preco_total or old('preco_total')}}" class="form-control" placeholder="Defina o preço total">
        </div>  

        <div class="form-group">
            <label for="exampleInputEmail1">Quantidade de parcelas</label>
            <input name="qtd_parcelas" type="number"  required min="0" value="{{$plano->exemplares or old('qtd_parcelas')}}" class="form-control" placeholder="Defina a quantidade de parcelas">
        </div>  
        <div class="form-group">
            <label for="exampleInputEmail1">Valor Parcelas</label>
            <input name="valor_parcelas" type="number" required step=".01" min="0" value="{{$plano->valor_parcelas or old('valor_parcelas')}}" class="form-control" placeholder="Defina o preço das parcelas">
        </div>    
        <div class="form-group">
            <label for="exampleInputEmail1">Prazo (dias)</label>
            <input name="prazo" type="number"  value="{{$plano->prazo or old('prazo')}}" class="form-control" >
        </div>  
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    @endsection
