<?php

namespace App\Http\Controllers\PanelCliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PagSeguro;
use App\Projeto;
class PagseguroNotificacaoController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
        //$this->middleware('auth:admin',['except' => 'index']);
    }

    public function notificacao(Request $request) {
        $pagseguro = PagSeguro::notification($request->notificationCode, $request->notificationType);

        $projeto = Projeto::find($pagseguro->reference);
        $projeto->statuspagseguro = $pagseguro->status;
        $projeto->update();
    }

}
