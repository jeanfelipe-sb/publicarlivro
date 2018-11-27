@extends('layouts.painel')
@section('title', 'Minha conta')

@section('content')
<section >
    <div class="container">	
        <h3 class="text-heading">{{$tituloPage}}</h3>
        <div class="single-skill">
        </div>
        <p class="sample-text">
            <b>Nome: </b>{{$cliente->name}}
            <br/>
            <b>Sobrenome: </b>{{$cliente->sobrenome}}
            <br>
            <b>CPF: </b>{{$cliente->cpf}}
            <br>
            <b>E-mail: </b>{{$cliente->email}}
            <br>
            <b>Telefone: </b>{{$cliente->telefone}}
            <br>
            <b>CEP: </b>{{$cliente->cep}}
            <br>
            <b>Cidade: </b>{{$cliente->cidade}}
            <br>
            <b>Estado: </b>{{$cliente->estado}}
            <br>
            <b>Endereço: </b>{{$cliente->endereco}}
            <br>
            <b>Número: </b>{{$cliente->numero}}

        </p>
        <br>
        
            <a href="{{ route('painel.minha-conta.editar') }}" title="Editar dados" class="btn btn-info">Alterar dados</a>

    </div>
</section>
@endsection
