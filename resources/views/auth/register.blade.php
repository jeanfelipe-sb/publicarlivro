@extends('layouts.site')

@section('content')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<section class="about-banner">
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Cadastro			
                </h1>	
            </div>	
        </div>
    </div>
</section>
<!-- Start Align Area -->
<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <h3 class="mb-30">Cadastro</h3>
                    <form class="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-12">
                                <h4>Nome</h4>
                                <div class="mt-10 ">
                                    <input id="name" name="name" type="text" name="first_name" placeholder="Insira seu nome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira seu Nome'" required class="single-input">
                                </div>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-12">
                                <h4>Sobrenome</h4>
                                <div class="mt-10 ">
                                    <input id="sobrenome" name="sobrenome" type="text" name="last_name" placeholder="Insira seu Sobrenome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira seu Sobrenome'" required class="single-input">
                                </div>
                                @if ($errors->has('sobrenome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sobrenome') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-12">
                                <h4>CPF</h4>
                                <div class="input-group-icon form-group{{ $errors->has('cep') ? ' has-error' : '' }} mt-10">
                                    <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    <input id="cpf" type="text" name="cpf" placeholder="CPF" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira seu CPF'" required class="single-input">
                                    @if ($errors->has('cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-md-5">
                                <h4>DDD</h4>
                                <div class="input-group-icon form-group{{ $errors->has('ddd') ? ' has-error' : '' }} mt-10">
                                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                    <input id="ddd" type="text" name="ddd" placeholder="Insira seu DDD" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira seu DDD'" maxlength="2" required class="single-input">
                                    @if ($errors->has('ddd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ddd') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-md-7">
                                <h4>Telefone Principal</h4>
                                <div class="input-group-icon form-group{{ $errors->has('telefone_principal') ? ' has-error' : '' }} mt-10">
                                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                    <input id="telefone_principal" type="text" name="telefone_principal" placeholder="Insira seu Telefone Principal" onfocus="this.placeholder = ''" maxlength="9"onblur="this.placeholder = 'Telefone Principal'" required class="single-input">
                                    @if ($errors->has('telefone_principal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefone_principal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-md-12">
                                <h4>Demais Telefones</h4>
                                <div class="input-group-icon form-group{{ $errors->has('telefone') ? ' has-error' : '' }} mt-10">
                                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                    <input id="telefone" type="text" name="telefone" placeholder="Insira seus Demais telefones" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Demais telefones'"  class="single-input">
                                    @if ($errors->has('telefone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-md-12">
                                <h4>CEP</h4>
                                <div class="input-group-icon form-group{{ $errors->has('cep') ? ' has-error' : '' }} mt-10">
                                    <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                    <input id="cep" type="text" name="cep" placeholder="Insira seu CEP" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira seu CEP'" required class="single-input">
                                    @if ($errors->has('cep'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cep') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-md-12">
                                <h4>Estado</h4>
                                <div class="input-group-icon mt-10">

                                    <div class="form-group {{ $errors->has('estado') ? ' has-error' : '' }}" >

                                        <select id="uf" name="estado">
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                        @if ($errors->has('estado'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('estado') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-md-12">
                                <h4>Cidade</h4>
                                <div class="input-group-icon mt-10 form-group {{ $errors->has('cidade') ? ' has-error' : '' }}">
                                    <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                                    <input id="cidade" type="text" name="cidade" placeholder="Insira sua Cidade" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira sua Cidade'" required class="single-input">
                                    @if ($errors->has('cidade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cidade') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-md-12">
                                <h4>Endereço</h4>
                                <div class="input-group-icon mt-10 form-group {{ $errors->has('endereco') ? ' has-error' : '' }}">
                                    <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                    <input id="logradouro" type="text" name="endereco" placeholder="Insira seu Endereço" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira seu Endereço'" required class="single-input">
                                    @if ($errors->has('endereco'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-md-12">
                                <h4>Número</h4>
                                <div class="input-group-icon mt-10">
                                    <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                    <input id="numero" type="text" name="numero" placeholder="Insira seu Número" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira seu Número'" required class="single-input">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-md-12">
                                <h4>Bairro</h4>
                                <div class="input-group-icon mt-10">
                                    <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                    <input id="bairro" type="text" name="bairro" placeholder="Insira seu Bairro" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira seu Bairro'" required class="single-input">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-md-12">
                                <h4>E-mail</h4>
                                <div class="mt-10">
                                    <div class="input-group-icon mt-10 form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                        <input id="email" type="text" name="email" placeholder="Insira seu E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira seu E-mail'" required class="single-input">
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-md-12">
                                <h4>Senha</h4>
                                <div class="mt-10">
                                    <div class="input-group-icon mt-10 form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="icon"><i class="fa fa-unlock" aria-hidden="true"></i></div>
                                        <input id="password"type="password" name="password" placeholder="Insira sua Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira sua Senha'" required class="single-input">
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-md-12">
                                <h4>Confirmar senha</h4>
                                <div class="mt-10">
                                    <div class="input-group-icon mt-10 form-group ">
                                        <div class="icon"><i class="fa fa-unlock" aria-hidden="true"></i></div>
                                        <input id="password-confirm" type="password" name="password_confirmation" placeholder="Conforme sua Senha" onfocus="this.placeholder = ''" required onblur="this.placeholder = 'Conforme sua Senha'"  class="single-input">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-md-12">
                                <div class="custom-control custom-radio mt-10 form-group ">
                                    <input id="debito" name="paymentMethod" type="checkbox" class="custom-control-input" required>
                                    <label class="custom-control-label" for="debito">Aceito os <a href="#">Termos de uso</a></label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="single-element-widget col-md-12">
                                <div class="input-group-icon mt-10 ">
                                    <button type="submit" class="genric-btn primary">
                                        Cadastrar
                                    </button>
                                </div>
                            </div>
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
