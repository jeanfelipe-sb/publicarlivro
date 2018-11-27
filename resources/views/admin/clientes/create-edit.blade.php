@extends('layouts.admin')

@section('content')
<a href="{{route('clientes.index')}}" class="btn btn-primary">Voltar</a>

<h1 >{{$tituloPage}}</h1>
@if(isset($errors)&& count ($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

@if(isset($cliente))
<form class="form" method="post" action="{{route('clientes.update',$cliente->id)}}">
    {!! method_field('PUT')!!}
    @else
    <form class="form" method="post" action="{{route('clientes.store')}}">
        @endif
        {!! csrf_field()!!}
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Nome</label>
            <input name="name" type="text" value="{{$cliente->name or old('name')}}" class="form-control" placeholder="Defina o nome do cliente">
        </div> 
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Sobrenome</label>
            <input name="sobrenome" type="text" value="{{$cliente->sobrenome or old('sobrenome')}}" class="form-control" placeholder="Defina o sobrenome do cliente">
        </div>   
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">CPF</label>
            <input name="cpf" type="text" value="{{$cliente->cpf or old('cpf')}}" class="form-control" placeholder="Defina CPF do cliente">
        </div>  
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">E-mail</label>
            <input name="email" type="email" value="{{$cliente->email or old('email')}}" class="form-control" placeholder="Defina o e-mail do cliente">
        </div>  
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Telefone</label>
            <input name="telefone" type="text" value="{{$cliente->telefone or old('telefone')}}" class="form-control" placeholder="Defina o telefone do cliente">
        </div> 
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">CEP</label>
            <input name="cep" id="cep" type="text" value="{{$cliente->cep or old('cep')}}" class="form-control" placeholder="Defina o CEP do cliente">
        </div>  
        <div class="form-group col-md-6 {{ $errors->has('estado') ? ' has-error' : '' }}" >
            <label for="exampleInputEmail1">Estado</label>

            <select id="uf" name="estado" class="form-control">
                @if(isset($cliente))
                @foreach($estadosBrasileiros as $uf => $estado)
                @if ($cliente->estado == $uf)
                <option value="{{$uf}}" selected>{{$estado}}</option>
                @else
                <option value="{{$uf}}">{{$estado}}</option>
                @endif
                @endforeach 
                @else                
                @foreach($estadosBrasileiros as $uf => $estado)
                <option value="{{$uf}}">{{$estado}}</option>
                @endforeach                 
                @endif
            </select>
            @if ($errors->has('estado'))
            <span class="help-block">
                <strong>{{ $errors->first('estado') }}</strong>
            </span>
            @endif
        </div> 
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Cidade</label>
            <input id="cidade" name="cidade" type="text" value="{{$cliente->cidade or old('cidade')}}" class="form-control" placeholder="Defina a cidade do cliente">
        </div>  
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Bairro</label>
            <input id="bairro" name="bairro" type="text" value="{{$cliente->bairro or old('bairro')}}" class="form-control" placeholder="Defina o bairro do cliente">
        </div>  

        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Endereco</label>
            <input id="logradouro" name="endereco" type="text" value="{{$cliente->endereco or old('endereco')}}" class="form-control" placeholder="Defina o endereço do cliente">
        </div>
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Número</label>
            <input id="numero" name="numero" type="text" value="{{$cliente->numero or old('numero')}}" class="form-control" placeholder="Defina o numero do endereço do cliente">
        </div>
        @if(!isset($cliente))
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Senha</label>
            <input name="password" type="password" value="{{old('password')}}" class="form-control" placeholder="Defina a senha do cliente">
        </div>         
        @endif
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script type="text/javascript">
        $("#cep").focusout(function () {
            //Início do Comando AJAX
            $.ajax({
                //O campo URL diz o caminho de onde virá os dados
                //É importante concatenar o valor digitado no CEP
                url: 'https://viacep.com.br/ws/' + $(this).val() + '/json/unicode/',
                //Aqui você deve preencher o tipo de dados que será lido,
                //no caso, estamos lendo JSON.
                dataType: 'json',
                //SUCESS é referente a função que será executada caso
                //ele consiga ler a fonte de dados com sucesso.
                //O parâmetro dentro da função se refere ao nome da variável
                //que você vai dar para ler esse objeto.
                success: function (resposta) {
                    //Agora basta definir os valores que você deseja preencher
                    //automaticamente nos campos acima.
                    $("#logradouro").val(resposta.logradouro);
                    $("#complemento").val(resposta.complemento);
                    $("#bairro").val(resposta.bairro);
                    $("#cidade").val(resposta.localidade);
                    $("#uf").val(resposta.uf);
                    //Vamos incluir para que o Número seja focado automaticamente
                    //melhorando a experiência do usuário
                    //$("#numero").focus();
                }
            });
        });
    </script>

    @endsection
