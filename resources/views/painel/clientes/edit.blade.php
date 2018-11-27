@extends('layouts.painel')
@section('title', 'Editar minha conta')

@section('content')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <h3 class="mb-30">{{$tituloPage}}</h3>
                    <form class="form" method="post" action="{{route('painel.minha-conta.update')}}">
                        {{ csrf_field() }}
                            {!! method_field('PUT')!!}

                        <div class="mt-10 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            Nome
                            <input id="name" name="name" value="{{$cliente->name}}" type="text" name="first_name" placeholder="Nome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome'" required class="single-input">
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="mt-10 form-group{{ $errors->has('sobrenome') ? ' has-error' : '' }}">
                            Sobrenome
                            <input id="sobrenome" value="{{$cliente->sobrenome}}" name="sobrenome" type="text" name="last_name" placeholder="Sobrenome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Sobrenome'" required class="single-input">
                            @if ($errors->has('sobrenome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sobrenome') }}</strong>
                            </span>
                            @endif
                        </div>
                        CPF
                        <div class="input-group-icon form-group{{ $errors->has('cep') ? ' has-error' : '' }} mt-10">
                            <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                            <input id="cpf" type="text" value="{{$cliente->cpf}}" name="cpf" placeholder="CPF" onfocus="this.placeholder = ''" onblur="this.placeholder = 'CPF'" required class="single-input">
                            @if ($errors->has('cpf'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cpf') }}</strong>
                            </span>
                            @endif
                        </div>
                        Telefone
                        <div class="input-group-icon form-group{{ $errors->has('telefone') ? ' has-error' : '' }} mt-10">
                            <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>

                            <input id="cpf" type="text" value="{{$cliente->telefone}}" name="telefone" placeholder="Telefone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Telefone'" required class="single-input">
                            @if ($errors->has('telefone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefone') }}</strong>
                            </span>
                            @endif
                        </div>
                        CEP
                        <div class="input-group-icon form-group{{ $errors->has('cep') ? ' has-error' : '' }} mt-10">
                            <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>          
                            <input id="cep" type="text" value="{{$cliente->cep}}" name="cep" placeholder="CEP" onfocus="this.placeholder = ''" onblur="this.placeholder = 'CEP'" required class="single-input">
                            @if ($errors->has('cep'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cep') }}</strong>
                            </span>
                            @endif
                        </div>
                        Estado
                        <div class="input-group-icon mt-10">

                            <div class="form-group {{ $errors->has('estado') ? ' has-error' : '' }}" >

                                <select id="uf" name="estado">
                                    @foreach($estadosBrasileiros as $uf => $estado)
                                    @if ($cliente->estado == $uf)
                                    <option value="{{$uf}}" selected>{{$estado}}</option>
                                    @else
                                    <option value="{{$uf}}">{{$estado}}</option>
                                    @endif
                                    @endforeach 
                                </select>
                                @if ($errors->has('estado'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('estado') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        Cidade
                        <div class="input-group-icon mt-10 form-group {{ $errors->has('cidade') ? ' has-error' : '' }}">
                            <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                            <input id="cidade" value="{{$cliente->cidade}}" type="text" name="cidade" placeholder="Cidade" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cidade'" required class="single-input">
                            @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cidade') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                        Bairro
                        <div class="input-group-icon mt-10 form-group {{ $errors->has('bairro') ? ' has-error' : '' }}">
                            <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                            <input id="bairro" type="text" value="{{$cliente->bairro}}" name="bairro" placeholder="Bairro" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Bairro'" required class="single-input">
                            @if ($errors->has('bairro'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bairro') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                        Endereço
                        <div class="input-group-icon mt-10 form-group {{ $errors->has('endereco') ? ' has-error' : '' }}">
                            <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                            <input id="logradouro" value="{{$cliente->endereco}}" type="text" name="endereco" placeholder="Endereço" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Endereço'" required class="single-input">
                            @if ($errors->has('endereco'))
                            <span class="help-block">
                                <strong>{{ $errors->first('endereco') }}</strong>
                            </span>
                            @endif
                        </div>
                        Número
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                            <input id="numero" type="text" value="{{$cliente->numero}}" name="numero" placeholder="Número" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Número'" required class="single-input">
                        </div>
                        E-mail
                        <div class="mt-10">
                            <div class="input-group-icon mt-10 form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                <input id="email" value="{{$cliente->email}}" type="text" name="email" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail'"  class="single-input">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <br>
                            <button type="submit" class="genric-btn primary">
                                Alterar
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


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
</div>
@endsection
