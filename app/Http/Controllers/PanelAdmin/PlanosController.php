<?php

namespace App\Http\Controllers\PanelAdmin;

use App\Http\Controllers\Controller;
use App\Plano;
use Illuminate\Http\Request;

class PlanosController extends Controller {

    private $plano;
    private $totalPlano = 15;

    public function __construct(Plano $plano) {
        $this->middleware('auth:admin');
        //$this->middleware('auth:admin',['except' => 'index']);
        $this->plano = $plano;
    }

    public function index() {
        $title = 'Listagem de planos';
        $planos = $this->plano->select('id', 'nome', 'sigla')->paginate($this->totalPlano);
        return view('admin.planos.index', compact('planos', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $tituloPage = 'Adicionar Plano';

        return view('admin.planos.create-edit', compact('tituloPage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //Pega os dados do formulário
        $dataForm = $request->all();
        $dataForm['pg_coloridas'] = (!isset($dataForm['pg_coloridas']) ? 0 : 1);
        $dataForm['pb'] = $dataForm['paginas'] - $dataForm['pc'];
        //Faz cadastro
        $insert = $this->plano->create($dataForm);

        if ($insert)
            return redirect()->route('planos.index');
        else
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $tituloPage = 'Plano';
        $plano = $this->plano->find($id);
        return view('admin.planos.show', compact('plano', 'tituloPage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $tituloPage = 'Editar Plano';
        $plano = $this->plano->find($id);
        return view('admin.planos.create-edit', compact('plano', 'tituloPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $plano = $this->plano->find($id);
        $dataForm = $request->all();
        $dataForm['pg_coloridas'] = (!isset($dataForm['pg_coloridas']) ? 0 : 1);

        $plano->pb = $dataForm['paginas'] - $dataForm['pc'];

        $update = $plano->update($dataForm);

        if ($update)
            return redirect()->route('planos.index');
        else
            return redirect()->route('planos.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $plano = $this->plano->find($id);
        $delete = $plano->delete();
        if ($delete)
            return redirect()->route('planos.index');
        else
            return redirect()->route('planos.show', $id)->with(['errors' => 'Falha ao deletar']);
    }

}
