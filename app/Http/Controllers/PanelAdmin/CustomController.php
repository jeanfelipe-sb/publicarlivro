<?php

namespace App\Http\Controllers\PanelAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Custom;

class CustomController extends Controller {

    private $custom;
    private $totalPage = 15;

    public function __construct(Custom $custom) {
        $this->middleware('auth:admin');
        //$this->middleware('auth:admin',['except' => 'index']);
        $this->custom = $custom;
    }

    public function index() {
        $title = 'Projetos personalizados tipos';
        $customs = $this->custom->select('id', 'tamanho')->paginate($this->totalPage);
        return view('admin.customs.index', compact('customs', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $tituloPage = 'Adicionar Custom';

        return view('admin.customs.create-edit', compact('tituloPage'));
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
        $insert = $this->custom->create($dataForm);

        if ($insert)
            return redirect()->route('customs.index');
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
        $tituloPage = 'Custom';
        $custom = $this->custom->find($id);
        return view('admin.customs.show', compact('custom', 'tituloPage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $tituloPage = 'Editar Custom';
        $custom = $this->custom->find($id);
        return view('admin.customs.create-edit', compact('custom', 'tituloPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $custom = $this->custom->find($id);
        $dataForm = $request->all();
        $update = $custom->update($dataForm);

        if ($update)
            return redirect()->route('customs.index');
        else
            return redirect()->route('customs.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $custom = $this->custom->find($id);
        $delete = $custom->delete();
        if ($delete)
            return redirect()->route('customs.index');
        else
            return redirect()->route('customs.show', $id)->with(['errors' => 'Falha ao deletar']);
    }

}
