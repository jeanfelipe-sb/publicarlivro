<?php

namespace App\Http\Controllers\PanelAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class PagesController extends Controller {

    private $page;
    private $totalPage = 15;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Page $page) {
        $this->middleware('auth:admin');
        //$this->middleware('auth:admin',['except' => 'index']);
        $this->page = $page;
    }

    public function index() {
        $title = 'Listagem de páginas';
        $pages = $this->page->paginate($this->totalPage);

        return view('admin.pages.index', compact('pages', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $tituloPage = 'Adicionar Página';

        return view('admin.pages.create-edit', compact('tituloPage'));
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
        $insert = $this->page->create($dataForm);

        if ($insert)
            return redirect()->route('pages.index');
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
        $tituloPage = 'Página';
        $page = $this->page->find($id);
        return view('admin.pages.show', compact('page', 'tituloPage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $tituloPage = 'Editar Página';
        $page = $this->page->find($id);
        return view('admin.pages.create-edit', compact('page', 'tituloPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $page = $this->page->find($id);
        $dataForm = $request->all();
        $update = $page->update($dataForm);

        if ($update)
            return redirect()->route('pages.index');
        else
            return redirect()->route('pages.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id) {
        $page = $this->page->find($id);
        $delete = $page->delete();
        if ($delete)
            return redirect()->route('pages.index');
        else
            return redirect()->route('pages.show', $id)->with(['errors' => 'Falha ao deletar']);
    }

}
