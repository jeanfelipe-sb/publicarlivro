<?php

namespace App\Http\Controllers\PanelCliente;

use App\Http\Controllers\Controller;
use App\Projeto;
use Illuminate\Support\Facades\Auth;

class PagamentoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        //$this->middleware('auth:admin',['except' => 'index']);
    }

    public function show($id) {
        $projeto = Projeto::find($id);

        if ($projeto->user_id == Auth::user()->id && $projeto->pago == 0) {
            $title = 'PAGAMENTO';
            return view('site.pagamento', compact('title', 'projeto'));
        } else {
            abort(404, 'Página não encontrada!');
        }
    }

    

}
