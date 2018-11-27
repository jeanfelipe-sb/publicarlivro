@extends('layouts.painel')
@section('title', 'Alterar senha')

@section('content')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <h3 class="mb-30">{{$tituloPage}}</h3>
                    <form class="form-horizontal" method="POST" action="{{ route('painel.minha-conta.senha') }}">
                        {{ csrf_field() }}
                        {!! method_field('PUT')!!}

                        <div class="mt-10">
                            <div class="input-group-icon mt-10 form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="icon"><i class="fa fa-unlock" aria-hidden="true"></i></div>
                                <input id="password" type="password" name="password" placeholder="Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha'"  class="single-input">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="mt-10">
                            <div class="input-group-icon mt-10 form-group ">
                                <div class="icon"><i class="fa fa-unlock" aria-hidden="true"></i></div>
                                <input id="password-confirm" type="password"  name="password_confirmation" placeholder="Conforme sua Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Conforme sua Senha'"  class="single-input">

                            </div>
                        </div>
                        <div class="input-group-icon mt-10 ">
                            <button type="submit" class="genric-btn primary">
                                Alterar
                            </button>
                        </div>
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
