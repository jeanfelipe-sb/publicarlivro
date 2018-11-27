<?php

namespace App\Http\Controllers\PanelAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StatusProj;

class StatusProjController extends Controller {

    private $statusProj;
    private $totalStatus = 15;

    public function __construct(StatusProj $statusProj) {
        $this->middleware('auth:admin');
        //$this->middleware('auth:admin',['except' => 'index']);
        $this->statusProj = $statusProj;
    }

    public function index() {
        $title = 'Listagem de Status de Projeto';
        $statusProjs = $this->statusProj->select('id', 'nome', 'ordem','porcentagem')->orderByRaw('ordem ASC')->paginate($this->totalStatus);
        return view('admin.statusProjs.index', compact('statusProjs', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $tituloPage = 'Adicionar Status de Projeto';

        return view('admin.statusProjs.create-edit', compact('tituloPage'));
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

        //Faz cadastro
        $insert = $this->statusProj->create($dataForm);

        if ($insert)
            return redirect()->route('statusProjs.index');
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
        $tituloPage = 'Status de Projeto';
        $statusProj = $this->statusProj->find($id);
        return view('admin.statusProjs.show', compact('statusProj', 'tituloPage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $tituloPage = 'Editar Status de Projeto';
        $statusProj = $this->statusProj->find($id);
        return view('admin.statusProjs.create-edit', compact('statusProj', 'tituloPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $statusProj = $this->statusProj->find($id);
        $dataForm = $request->all();
        $update = $statusProj->update($dataForm);

        if ($update)
            return redirect()->route('statusProjs.index');
        else
            return redirect()->route('statusProjs.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $statusProj = $this->statusProj->find($id);
        $delete = $statusProj->delete();
        if ($delete)
            return redirect()->route('statusProjs.index');
        else
            return redirect()->route('statusProjs.show', $id)->with(['errors' => 'Falha ao deletar']);
    }
    

}
