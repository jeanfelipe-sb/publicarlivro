<?php

namespace App\Http\Controllers\PanelAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Projeto;
use App\StatusProj;

class ClientesController extends Controller {

    private $user;
    private $totalUser = 15;

    public function __construct(User $user) {
        $this->middleware('auth:admin');
        //$this->middleware('auth:admin',['except' => 'index']);
        $this->user = $user;
    }

    public function index() {
        $title = 'Listagem de clientes';
        $users = $this->user->select('name', 'id', 'email')->paginate($this->totalUser);

        return view('admin.clientes.index', compact('users', 'title'));
    }

    public function show($id) {
        $tituloPage = 'Cliente';
        $cliente = $this->user->find($id);
        return view('admin.clientes.show', compact('cliente', 'tituloPage'));
    }

    public function create() {
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
        $tituloPage = 'Adicionar Cliente';

        return view('admin.clientes.create-edit', compact('tituloPage', 'estadosBrasileiros'));
    }

    public function store(Request $request) {
        //Pega os dados do formulário
        $dataForm = $request->all();

        $dataForm['password'] = bcrypt($dataForm['password']);
        //Faz cadastro
        $insert = $this->user->create($dataForm);

        if ($insert)
            return redirect()->route('clientes.index');
        else
            return redirect()->back()->with(['errors' => 'Falha ao registrar']);
    }

    public function edit($id) {
        $tituloPage = 'Editar Cliente';
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
        $cliente = $this->user->find($id);
        return view('admin.clientes.create-edit', compact('cliente', 'tituloPage', 'estadosBrasileiros'));
    }

    public function update(Request $request, $id) {
        $cliente = $this->user->find($id);
        $dataForm = $request->all();
        $dataForm['password'] = bcrypt($dataForm['password']);
        $update = $cliente->update($dataForm);

        if ($update)
            return redirect()->route('clientes.index');
        else
            return redirect()->route('clientes.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    public function destroy($id) {
        $cliente = $this->user->find($id);
        $delete = $cliente->delete();
        if ($delete)
            return redirect()->route('clientes.index');
        else
            return redirect()->route('clientes.show', $id)->with(['errors' => 'Falha ao deletar']);
    }

    public function projetos($user_id) {
        $tituloPage = 'Lista de projetos';
        $user = User::where('id', $user_id)->first();
        $projetos = Projeto::where('user_id', $user_id)->paginate();
        $status = StatusProj::orderBy('ordem', 'ASC')->get();


        return view('admin.projetos.index', compact('projetos', 'tituloPage', 'user','status'));
    }

    public function senha($user_id) {
        $cliente = User::where('id', $user_id)->first();

        $tituloPage = 'Alterar senha de ' . $cliente->name;
        return view('admin.clientes.senha', compact('cliente', 'tituloPage', 'estadosBrasileiros'));
    }

    public function alterarsenha(Request $request, $id) {
        $cliente = $this->user->find($id);
        $dataForm = $request->all();
        $cliente->password = bcrypt($dataForm['password']);
        $update = $cliente->update();
        if ($update)
            return redirect()->route('clientes.index');
        else
            return redirect()->route('clientes.senha', $id)->with(['errors' => 'Falha ao editar']);
    }

    public function busca(Request $request) {
        $title = 'Listagem de clientes';
        $dataForm = $request->all();
        $users = User::where('name', 'LIKE', '%' . $dataForm['search'] . '%')->paginate($this->totalUser);


        return view('admin.clientes.index', compact('users', 'title'));
    }

}
