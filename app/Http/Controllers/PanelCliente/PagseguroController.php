<?php

namespace App\Http\Controllers\PanelCliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use PagSeguro;
use Illuminate\Support\Carbon;

class PagseguroController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        //$this->middleware('auth:admin',['except' => 'index']);
    }

    public function boleto(Request $r) {
        //dd($r->pagseguro_token_boleto);

        $pagseguro = PagSeguro::setReference($r->idProjeto)
                ->setSenderInfo([
                    'senderName' => Auth::user()->name . ' ' . Auth::user()->sobrenome, //Deve conter nome e sobrenome
                    'senderPhone' => '(' . Auth::user()->ddd . ')' . Auth::user()->telefone_principal, //Código de área enviado junto com o telefone
                    'senderEmail' => Auth::user()->email,
                    'senderHash' => $r->pagseguro_token_boleto,
                    'senderCPF' => Auth::user()->cpf //Ou CNPJ se for Pessoa Júridica
                ])
                ->setItems([
                    [
                        'itemId' => $r->idProjeto,
                        'itemDescription' => 'Publicação',
                        'itemAmount' => $r->valor, //Valor unitário
                        'itemQuantity' => '1', // Quantidade de itens
                    ],
                ])
                ->send([
            'paymentMethod' => 'boleto'
        ]);
        return redirect($pagseguro->paymentLink);
    }

    public function debito(Request $r) {
        //dd($r->pagseguro_token_debito);

        $pagseguro = PagSeguro::setReference($r->idProjeto)
                ->setSenderInfo([
                    'senderName' => Auth::user()->name . ' ' . Auth::user()->sobrenome, //Deve conter nome e sobrenome
                    'senderPhone' => '(' . Auth::user()->ddd . ')' . Auth::user()->telefone_principal, //Código de área enviado junto com o telefone
                    'senderEmail' => Auth::user()->email,
                    'senderHash' => $r->pagseguro_token_debito,
                    'senderCPF' => Auth::user()->cpf //Ou CNPJ se for Pessoa Júridica
                ])
                ->setItems([
                    [
                        'itemId' => $r->idProjeto,
                        'itemDescription' => 'Publicação',
                        'itemAmount' => $r->valor, //Valor unitário
                        'itemQuantity' => '1', // Quantidade de itens
                    ],
                ])
                ->send([
            'paymentMethod' => 'eft',
            'bankName' => $r->banco
        ]);
        return redirect($pagseguro->paymentLink);
    }

    public function credito(Request $r) {
        //dd($r->pagseguro_token_credito);
        //Formatando Data vindo do request
        $date = Carbon::parse($r->nascimento)->format('d/m/Y');
//        /dd($r->nascimento->format('Y-m-d H:i:s'));
        try {
            $pagseguro = PagSeguro::setReference($r->idProjeto)
                    ->setSenderInfo([
                        'senderName' => $r->username, //Deve conter nome e sobrenome
                        'senderPhone' => '(' . Auth::user()->ddd . ')' . Auth::user()->telefone_principal, //Código de área enviado junto com o telefone
                        'senderEmail' => Auth::user()->email,
                        'senderHash' => $r->pagseguro_token_credito,
                        'senderCPF' => Auth::user()->cpf  //Ou CNPJ se for Pessoa Júridica
                    ])
                    ->setCreditCardHolder([
                        'creditCardHolderBirthDate' => $date, //data de nascimento do titular do cartão
                    ])
                    ->setShippingAddress([
                        'shippingAddressStreet' => Auth::user()->endereco,
                        'shippingAddressNumber' => Auth::user()->numero,
                        'shippingAddressDistrict' => Auth::user()->bairro,
                        'shippingAddressPostalCode' => Auth::user()->cep,
                        'shippingAddressCity' => Auth::user()->cidade,
                        'shippingAddressState' => Auth::user()->estado
                    ])
                    ->setItems([
                        [
                            'itemId' => $r->idProjeto,
                            'itemDescription' => 'Publicação',
                            'itemAmount' => $r->valorTotalCredito, //Valor unitário
                            'itemQuantity' => '1', // Quantidade de itens
                        ]
                    ])
                    ->send([
                'paymentMethod' => 'creditCard',
                'creditCardToken' => $r->pagseguro_token_card_credito,
                'installmentQuantity' => $r->QuantidadeParcelas,
                'installmentValue' => $r->parcelas,
            ]);
            return redirect()->route('site.pagamento', $r->idProjeto)->with('success', 'Pagamento enviado com sucesso!');
        } catch (\Exception $e) {
                        //return $e->getMessage();

            return redirect()->route('site.pagamento', $r->idProjeto)->with('error', 'Erro ao enviar o pagamento. Detalhe.: "'.$e->getMessage().'"');

           
        }
    }

}
