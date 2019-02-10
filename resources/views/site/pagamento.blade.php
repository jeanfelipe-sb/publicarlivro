@extends('layouts.painel')

@section('content')


<div class="container">
    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}

    </div>
    @endif
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <h2>{{$title}}</h2>
    <br>
    <div class="container">
        <div class="row"> 
            <div class="col-md-4 order-md-2 mb-4">
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Projeto para publicação</h6><br>
                            Descrição:<br>
                            <br>
                            <b class="text-muted">{{$projeto['paginas']. ' páginas'}}</b><br>
                            <b class="text-muted">{{$projeto['exemplares']. ' exemplares'}}</b><br>
                            <b class="text-muted">{{'formato '.$projeto['tamanho']}}</b>
                        </div>
                    </li>


                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (BRL)</span>
                        <strong>R$ {{number_format($projeto['valor'], 2, ',', '.')}} </strong>
                    </li>
                </ul>
            </div>

            <article class="col-md-8 order-md-1 card">
                <div class="card-body p-4">

                    <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                                <i class="fa fa-credit-card"></i> Cartão de Crédito</a>
                        </li>                        
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#nav-tab-debito">
                                <i class="fa fa-university"></i> Cartão de Débito</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#nav-tab-paypal">
                                <i class="fa fa-barcode"></i>  Boleto</a>
                        </li>
<!--                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                                <i class="fa fa-university"></i> Tranferência</a>
                        </li>-->
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-tab-card">
<!--                                <p class="alert alert-success">Some text success or error</p>-->

                            <h3>Pagar com cartão de crédito</h3>
                            <br>
                            <div class="CartaoCredito"></div>
                            <form role="form" name="pagamentoCredito" id="pagamentoCredito" action="{{route('seguro.credito')}}" >
                                <div class="form-group">
                                    <label for="username">Nome do titular (como está gravado no Cartão)</label>
                                    <input type="text" class="form-control" name="username" placeholder="" required="">
                                </div> <!-- form-group.// -->
                                <div class="form-group">
                                    <label for="nascimento">Data de nascimento do titular </label>
                                    <input type="date" class="form-control" name="nascimento" placeholder="" required="">
                                </div> <!-- form-group.// -->

                                <div class="form-group">
                                    <label for="cardNumber">Número do Cartão</label>
                                    <div class="input-group">

                                        <input type="text" class="form-control" onkeypress="return isNumberKey(event)" name="cardNumber" id="cardNumber" placeholder="" required="">
                                        <div class="input-group-append">
                                            <span class="input-group-text text-muted">
                                                <div class="BandeiraCartao">

                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div> <!-- form-group.// -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label><span class="hidden-xs">Data de Validade</span> </label>
                                            <div class="input-group">
                                                <input type="text" maxlength="2" onkeypress="return isNumberKey(event)" id="MesVal" name="MesVal" class="form-control" placeholder="Mês (MM)" name="" required="">
                                                <input type="text" maxlength="4" onkeypress="return isNumberKey(event)" id="AnoVal" name="AnoVal" class="form-control" placeholder="Ano (AAAA)" name="" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label data-toggle="tooltip" title="" data-original-title="O Código de Segurança são os 3 últimos números encontrados na parte de trás do CARTÃO.">Código <i class="fa fa-question-circle"></i></label>
                                            <input type="text" onkeypress="return isNumberKey(event)" id="CVV" name="CVV" class="form-control" maxlength="3" required="">
                                        </div> <!-- form-group.// -->
                                    </div>
                                </div> <!-- row.// -->
                                <div class="form-group">
                                    <label for="username">Quantidade de Parcelas</label>
                                    <select class="form-control" name="parcelas" id="parcelas" required>
                                        <option >Selecione</option>
                                    </select>
                                </div>
                                <div class="erros"></div><!-- form-group.// -->
                                <input name="QuantidadeParcelas" id="QuantidadeParcelas" type="hidden" value="">
                                <input name="idProjeto" id="idProjeto" type="hidden" value="{{$projeto['id']}}">
                                <input name="BandeiraCartao" id="BandeiraCartao" type="hidden" value="{{number_format($projeto['valor'], 2, '.', '')}}">
                                <input name="valorTotalCredito" id="valorTotalCredito" type="hidden" value="{{number_format($projeto['valor'], 2, '.', '')}}">
                                <input name="pagseguro_token_card_credito" id="pagseguro_token_card_credito" type="hidden" >
                                <input name="pagseguro_token_credito" id="pagseguro_token_credito" type="hidden" >
                                <button id="ConfimarCredito" onclick="credito();" name="ConfimarCredito" class=" btn btn-primary btn-block" type="submit"> Confirmar  </button>
                            </form>
                            <br> <div class="bandeiras"></div>
                        </div> <!-- tab-pane.// -->
                        <div class="tab-pane fade" id="nav-tab-debito">
<!--                                <p class="alert alert-success">Some text success or error</p>-->

                            <h3>Pagar com débito em conta</h3>
                            <br>
                            <form  name="pagamento" id="pagamento" action="{{route('seguro.debito')}}" target="_blank">
                                <p>Selecione o Banco</p>
                                <p>
                                    <input name="pagseguro_token_debito" id="pagseguro_token_debito" type="hidden" >
                                    <input name="valor" id="valor" type="hidden" value="{{number_format($projeto['valor'], 2, '.', '')}}">
                                    <input name="banco" id="banco" type="hidden" value="itau">
                                    <input name="idProjeto" id="idProjeto" type="hidden" value="{{$projeto['id']}}">

                                    <button class="btn btn-success" onclick="debito();" type="submit"> <i class="fa fa-credit-card"></i> Itaú </button>
                                </p>
                            </form>
                        </div> <!-- tab-pane.// -->
                        <div class="tab-pane fade" id="nav-tab-paypal">
                            <form  name="pagamento" id="pagamento" action="{{route('seguro.boleto')}}" target="_blank">
                                <p>Clique no botão para gerar boleto</p>
                                <p>
                                    <input name="pagseguro_token_boleto" id="pagseguro_token_boleto" type="hidden" >
                                    <input name="valor" id="valor" type="hidden" value="{{number_format($projeto['valor'], 2, '.', '')}}">
                                    <input name="idProjeto" id="idProjeto" type="hidden" value="{{$projeto['id']}}">

                                    <button class="btn btn-success" onclick="boleto();" type="submit"> <i class="fa fa-barcode"></i> Gerar boleto </button>
                                </p>
                                <p><strong>Nota:</strong> O boleto é gerado pela plataforma do PagSeguro, gerando o custo adicional de R$ 1,00  (Um real). </p>
                            </form>
                        </div>

<!--                        <div class="tab-pane fade" id="nav-tab-bank">
                            <p>Bank accaunt details</p>
                            <dl class="param">
                                <dt>BANCO: </dt>
                                <dd> THE WORLD BANK</dd>
                            </dl>
                            <dl class="param">
                                <dt>Conta: </dt>
                                <dd> 12345678912345</dd>
                            </dl>
                            <dl class="param">
                                <dt>Agência: </dt>
                                <dd> 123456789</dd>
                            </dl>
                            <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. </p>
                        </div>  tab-pane.// -->
                    </div> <!-- tab-content .// -->

                </div> <!-- card-body.// -->
            </article> <!-- card.// -->

        </div> <!-- row.// -->

    </div> 
    <!--container end.//-->


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

<script>
                                        $(document).ready(function () {
                                            $('[data-toggle="tooltip"]').tooltip();
                                        });
</script>
<script>
    PagSeguroDirectPayment.setSessionId('{{ PagSeguro::startSession() }}');

</script>
<script src="{{ asset('js/javascriptPagSeguro.js') }}"></script>


@endsection
