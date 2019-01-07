<?php

namespace App\Http\Controllers\PanelAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Projeto;
use App\StatusProj;
use App\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ProjetosController extends Controller {

    private $statusProj;
    private $projeto;
    private $totalProjeto = 30;

    public function __construct(Projeto $projeto) {
        $this->middleware('auth:admin');
        //$this->middleware('auth:admin',['except' => 'index']);
        $this->projeto = $projeto;
    }

    public function index() {
        $title = 'Listagem de projetos';
        $status = StatusProj::orderBy('ordem', 'ASC')->get();
        $projetos = $this->projeto->select('id', 'titulo', 'user_id', 'status_projs_id','pago', 'created_at')->orderBy('created_at', 'desc')->paginate($this->totalProjeto);
        return view('admin.projetos.index', compact('projetos', 'title', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($status_projs_id = null, $user_id = null) {
        $tituloPage = 'Adicionar Projeto';
        if (!$status_projs_id) {
            $status = StatusProj::orderBy('ordem', 'ASC')->get();
        }
        if (!$user_id) {
            $users = User::all();
        }
        return view('admin.projetos.create-edit', ['status_projs_id' => $status_projs_id, 'status' => $status, 'user_id' => $user_id, 'users' => $users], compact('tituloPage'));
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

        $dataForm['pago'] = (!isset($dataForm['pago']) ? 0 : 1);
        //Faz cadastro
        $insert = $this->projeto->create($dataForm);

        if ($insert)
            return redirect()->route('projetos.index');
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
        $tituloPage = 'Projeto';
        $projeto = $this->projeto->find($id);
        return view('admin.projetos.show', compact('projeto', 'tituloPage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $status_projs_id = null, $user_id = null) {
        $tituloPage = 'Editar Projeto';
        if (!$status_projs_id) {
            $status = StatusProj::all();
        }
        if (!$user_id) {
            $users = User::all();
        }
        $projeto = $this->projeto->find($id);
        return view('admin.projetos.create-edit', ['status_projs_id' => $status_projs_id, 'status' => $status, 'user_id' => $user_id, 'users' => $users], compact('projeto', 'tituloPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $projeto = $this->projeto->find($id);
        $dataForm = $request->all();

        //Verefica se check box está marcado
        $dataForm['pago'] = (!isset($dataForm['pago']) ? 0 : 1);
        $update = $projeto->update($dataForm);

        if ($update)
            return redirect()->route('projetos.index');
        else
            return redirect()->route('projetos.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $projeto = $this->projeto->find($id);
        $delete = $projeto->delete();
        if ($delete)
            return redirect()->route('projetos.index');
        else
            return redirect()->route('projetos.show', $id)->with(['errors' => 'Falha ao deletar']);
    }
    
    public function confirmarPagamento($id) {
        $projeto = $this->projeto->find($id);
        $projeto->pago = true;
        $update = $projeto->update();
        if ($update)
            return redirect()->route('projetos.index');
        else
            return redirect()->route('projetos.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    public function avanacarStatus(Request $request, $id) {

        $dataForm = $request->all();
        $projeto = $this->projeto->find($id);
        $projeto->status_projs_id = $dataForm['status_projs_id'];


        $update = $projeto->update();

        if ($update)
            return redirect()->route('projetos.index');
        else
            return redirect()->route('projetos.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    public function indexByStatus($statusId) {
        $title = 'Listagem de projetos';
        $status = StatusProj::orderBy('ordem', 'ASC')->get();
        $projetos = $this->projeto->where('status_projs_id', $statusId)->paginate($this->totalProjeto);
        return view('admin.projetos.index', compact('projetos', 'title', 'status'));
    }

    public function busca(Request $request) {
        $title = 'Listagem de projetos';
        $status = StatusProj::orderBy('ordem', 'ASC')->get();
        $dataForm = $request->all();
        $projetos = Projeto::where('titulo', 'LIKE', '%' . $dataForm['search'] . '%')->paginate($this->totalProjeto);


        return view('admin.projetos.index', compact('projetos', 'title', 'status'));
    }

    public function download($filename = '') {
        // Check if file exists in app/storage/file folder
        $file_path = storage_path() . "/app/public/originais/" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename=' . $filename,
        );
        if (file_exists($file_path)) {
            // Send Download
            return Response::download($file_path, $filename, $headers);
        } else {
            // Error
            exit('Arquivo não existe em nosso servidor!');
        }
    }

    public function deleteOrigialFile($id) {
        $projeto = $this->projeto->find($id);

        $file = 'originais/' . $projeto->original_file;

        $projeto->original_file = null;
        //Verefica se check box está marcado
        $update = $projeto->update();

        if ($update) {
            Storage::delete($file);
            return redirect()->route('projetos.show', $id);
        } else {
            return redirect()->route('projetos.show', $id)->with(['errors' => 'Falha ao editar']);
        }
    }

}
