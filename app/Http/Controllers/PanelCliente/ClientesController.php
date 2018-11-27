<?php

namespace App\Http\Controllers\PanelCliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Painel\AlterarSenhaClienteRequest;
class ClientesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        //$this->middleware('auth:admin',['except' => 'index']);
    }

    public function show() {
        $tituloPage = 'Minha Conta';
        $cliente = Auth::user();
        return view('painel.clientes.minha-conta', compact('cliente', 'tituloPage'));
    }

    public function edit() {
        $tituloPage = 'Editar Meus Dados';
        $cliente = Auth::user();
        $estadosBrasileiros = array(
            'AC' => 'Acre',
            'AL' => 'Alagoas',
            'AP' => 'Amapá',
            'AM' => 'Amazonas',
            'BA' => 'Bahia',
            'CE' => 'Ceará',
            'DF' => 'Distrito Federal',
            'ES' => 'Espírito Santo',
            'GO' => 'Goiás',
            'MA' => 'Maranhão',
            'MT' => 'Mato Grosso',
            'MS' => 'Mato Grosso do Sul',
            'MG' => 'Minas Gerais',
            'PA' => 'Pará',
            'PB' => 'Paraíba',
            'PR' => 'Paraná',
            'PE' => 'Pernambuco',
            'PI' => 'Piauí',
            'RJ' => 'Rio de Janeiro',
            'RN' => 'Rio Grande do Norte',
            'RS' => 'Rio Grande do Sul',
            'RO' => 'Rondônia',
            'RR' => 'Roraima',
            'SC' => 'Santa Catarina',
            'SP' => 'São Paulo',
            'SE' => 'Sergipe',
            'TO' => 'Tocantins'
        );
        return view('painel.clientes.edit', compact('cliente', 'tituloPage', 'estadosBrasileiros'));
    }

    public function update(Request $request) {
        $cliente = Auth::user();
        $dataForm = $request->all();
        $update = $cliente->update($dataForm);

        if ($update)
            return redirect()->route('painel.minha-conta');
        else
            return redirect()->route('painel.minha-conta.editar', $id)->with(['errors' => 'Falha ao editar']);
    }

    public function senha() {
        $tituloPage = 'Alterar minha senha';
        $cliente = Auth::user();
        return view('painel.clientes.senha', compact('cliente', 'tituloPage', 'estadosBrasileiros'));
    }

    public function alterarsenha(AlterarSenhaClienteRequest $request) {
        $cliente = Auth::user();
        $dataForm = $request->all();
        $cliente->password = bcrypt($dataForm['password']);
        $update = $cliente->update();
        if ($update)
            return redirect()->route('painel.minha-conta');
        else
            return redirect()->route('painel.minha-conta.senha', $id)->with(['errors' => 'Falha ao editar']);
    }

}
