<?php

namespace App\Http\Controllers\PanelAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Validator;

class UserAdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $admin;
    private $totalAdmin = 15;

    public function __construct(Admin $admin) {
        $this->middleware('auth:admin');
        //$this->middleware('auth:admin',['except' => 'index']);
        $this->admin = $admin;
    }

    public function index() {
        $title = 'Listagem de Usuários Admin';
        $userAdmins = $this->admin->select('id', 'name', 'email')->orderByRaw('id ASC')->paginate($this->totalAdmin);
        return view('admin.user_admin.index', compact('userAdmins', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $tituloPage = "Criar Usuário";
        return view('admin.user_admin.create-edit', compact('tituloPage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validator($request->all())->validate();
        $dataForm = $request->all();

        $dataForm['password'] = bcrypt($dataForm['password']);
        //Faz cadastro
        $insert = $this->admin->create($dataForm);
        if ($insert)
            return redirect()->route('users-admin.index');
        else
            return redirect()->back()->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $tituloPage = 'Editar Dados';
        $admin = $this->admin->find($id);
        return view('admin.user_admin.show', compact('tituloPage', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $tituloPage = 'Editar Meus Dados';
        $admin = $this->admin->find($id);

        return view('admin.user_admin.create-edit', compact('tituloPage', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $admin = $this->admin->find($id);
        $dataForm = $request->all();
        $update = $admin->update($dataForm);

        if ($update)
            return redirect()->route('users-admin.index');
        else
            return redirect()->route('users-admin.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $admin = $this->admin->find($id);
        $delete = $admin->delete();
        if ($delete)
            return redirect()->route('users-admin.index');
        else
            return redirect()->route('users-admin.show', $id)->with(['errors' => 'Falha ao deletar']);
    }

    public function senha($user_id) {
        $admin = Admin::where('id', $user_id)->first();

        $tituloPage = 'Alterar senha de ' . $admin->name;
        return view('admin.user_admin.senha', compact('admin', 'tituloPage'));
    }

    public function alterarsenha(Request $request, $id) {
        $admin = $this->admin->find($id);
        $dataForm = $request->all();
        $admin->password = bcrypt($dataForm['password']);
        $update = $admin->update();
        if ($update)
            return redirect()->route('users-admin.index');
        else
            return redirect()->route('admin.users-admin.senha', $id)->with(['errors' => 'Falha ao editar']);
    }

    public function busca(Request $request) {
        $title = 'Listagem de clientes';
        $dataForm = $request->all();
        $userAdmins = Admin::where('name', 'LIKE', '%' . $dataForm['search'] . '%')->paginate($this->totalAdmin);


        return view('admin.user_admin.index', compact('userAdmins', 'title'));
    }

    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:admins',
                    'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
}
