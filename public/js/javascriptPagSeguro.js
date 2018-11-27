var Amount = document.getElementById("valorTotalCredito").value;
//token debito
function debito() {
    $('#pagseguro_token_debito').val(PagSeguroDirectPayment.getSenderHash());

}

//token boleto
function boleto() {
    $('#pagseguro_token_boleto').val(PagSeguroDirectPayment.getSenderHash());
}
//token credito
function credito() {
    $('#pagseguro_token_credito').val(PagSeguroDirectPayment.getSenderHash());
}
//$("#ConfimarCredito").on('click', function () {
//    PagSeguroDirectPayment.onSenderHashReady(function (response) {
//        $('#pagseguro_token_credito').val(response.senderHash);
//        getTokenCard();
//    });
//});


//Apenas numeros no input
function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}

//Chamar função de token card
$('#CVV').on('blur', function () {
    // console.log('teste');
    getTokenCard();

});

$('#MesVal').on('blur', function () {
    // console.log('teste');
    getTokenCard();

});
$('#AnoVal').on('blur', function () {
    // console.log('teste');
    getTokenCard();

});


//Token Cartão de Crédito
function getTokenCard() {

    PagSeguroDirectPayment.createCardToken({

        cardNumber: $('#cardNumber').val(),
        brand: $('#BandeiraCartao').val(),
        cvv: $('#CVV').val(),
        expirationMonth: $('#MesVal').val(),
        expirationYear: $('#AnoVal').val(),
        success: function (response) {
           // console.log(response);

            $('#pagseguro_token_card_credito').val(response.card.token);

        },
        error: function (response) {
            console.log(response);
            //$('.erros').append('Erro nos dados do cartão');
            //tratamento do erro
        },
        complete: function (response) {
            //tratamento comum para todas chamadas
        }
    });
}


//Mostrar Bandeiras disponíveis
BandeirasImagens();
function BandeirasImagens() {

    PagSeguroDirectPayment.getPaymentMethods({
        amount: Amount,
        success: function (response) {
            //console.log(response.paymentMethods.CREDIT_CARD.options);
            $.each(response.paymentMethods.CREDIT_CARD.options, function (i, obj) {
                if (obj.status == "AVAILABLE") {
                    $(document).ready(function () {
                        $('.bandeiras').append('<img src="https://stc.pagseguro.uol.com.br' + obj.images.MEDIUM.path + '" title="' + obj.name + '"> ');
//                    /console.log('<img src="https://stc.pagseguro.uol.com.br' + obj.images.SMALL.path + "");
                    });
                }
            });
        },
        error: function (response) {
            console.log(response);

            $('.bandeiras').append('');
        }
    });
}



//Mostrar Imagem da bandeira do cartão e quantidade de Barcelas
//document.getElementById("cardNumber").onkeyup = function () {
//    BandeiraParcelas();
//};


//mostrar a bandeira digitada

//function BandeiraParcelas() {
//    var CardNumber = document.getElementById("cardNumber");
//    CardNumber = CardNumber.value;
//    var QtdCaracteres = CardNumber.length;
//    if (QtdCaracteres == 6) {
//        PagSeguroDirectPayment.getBrand({
//            cardBin: CardNumber,
//            success: function (response) {
//                var BandeiraImg = response.brand.name;
//                $("#BandeiraCartao").val(BandeiraImg);
//                $(".BandeiraCartao").html('<img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/' + BandeiraImg + '.png">');
//                getParcelas(BandeiraImg);
//            }, error: function (response) {
//                $(".BandeiraCartao").html('Cartão não encontrado!');
//            }
//        });
//    }
//}

$('#cardNumber').on('blur', function () {
    var CardNumber = document.getElementById("cardNumber");
    CardNumber = CardNumber.value;
    PagSeguroDirectPayment.getBrand({
        cardBin: CardNumber,
        success: function (response) {
            //console.log(response);
            getTokenCard();

            var BandeiraImg = response.brand.name;
            $("#BandeiraCartao").val(BandeiraImg);
            $(".BandeiraCartao").html('<img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/' + BandeiraImg + '.png">');
            getParcelas(BandeiraImg);
        }, error: function (response) {
            console.log(response);

        }
    });
});

//Pegar o valor e a quantidade de parcelas
$("#parcelas").on('change', function () {
    var ValueSelected = document.getElementById('parcelas');
    //console.log(ValueSelected);
    $("#QuantidadeParcelas").val(ValueSelected.options[ValueSelected.selectedIndex].id);
});

//gerar PARCELAS
function getParcelas(Bandeira) {

    PagSeguroDirectPayment.getInstallments({
        amount: Amount,
        brand: Bandeira,
        maxInstallmentNoInterest: 0,
        success: function (response) {
            $.each(response.installments, function (i, obj) {
                $.each(obj, function (i2, obj2) {
                    ValorParcelas = obj2.installmentAmount;
                    ValorPacelasReal = ValorParcelas.toFixed(2).replace(".", ",");
                    Quantidade = obj2.quantity;
                    $("#parcelas").append('<option value="' + ValorParcelas.toFixed(2) + '" id="' + Quantidade + '">' + Quantidade + " parcelas de R$ " + ValorPacelasReal + "</option>");
                });
            });
        },
        error: function (response) {
            console.log(response);
        }
    });
}


