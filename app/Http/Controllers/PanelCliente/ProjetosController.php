<?php

namespace App\Http\Controllers\PanelCliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Projeto;
use App\StatusProj;
use App\User;
use App\Plano;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Custom;
use Illuminate\Support\Facades\Session;

class ProjetosController extends Controller {

    private $statusProj;
    private $projeto;
    private $totalProjeto = 15;
    
   

    public function __construct(Projeto $projeto) {
        $this->middleware('auth');
        //$this->middleware('auth:admin',['except' => 'index']);
        $this->projeto = $projeto;
    }
      public function criarProjeto() {
        $titulo = 'Criar Projeto';
        $planos = Plano::all();
        return view('site.publique', compact('planos','titulo'));
    }

    public function index() {

        $title = 'Meus Projetos - Resumo';
        $user = Auth::user()->id;
        $projetos = $this->projeto->select('id', 'titulo','paginas','valor', 'user_id', 'created_at', 'status_projs_id', 'pago')->where('user_id', $user)->orderBy('id', 'desc')->paginate($this->totalProjeto);
        return view('painel.home', compact('projetos', 'title'));
    }

    public function create($plano_id) {
        $tituloPage = 'Adicionar Plano';
        $plano = Plano::find($plano_id);


        return view('painel.projetos.create', compact('tituloPage', 'plano'));
    }

    public function store(Request $request, $plano_id) {

        //Pega os dados do formulário
        $dataForm = $request->all();
        //Procura o plano no db
        $plano = Plano::find($plano_id);
        //Procura o status no db
        $status = StatusProj::where('ordem', 0)->first();
        //calcula prazo
        $date = new DateTime('+' . $plano['prazo'] . ' day');


        //extensão do arquivo
        $file_extension = $request->original_file->extension();

        //se a extensão do arquivo for doc e docx
        if ($file_extension == 'doc' || $file_extension == 'docx') {
            // Verifica se informou o arquivo e se é válido
            if ($request->hasFile('original_file') && $request->file('original_file')->isValid()) {
                // Define um aleatório para o arquivo baseado no timestamps atual
                $name = uniqid(Auth::user()->id . '-' . Auth::user()->name . '-' . date('d-m-Y-'));
                // Define finalmente o nome
                $nameFile = "{$name}.{$file_extension}";

                // Faz o upload:
                $upload = $request->original_file->storeAs('originais', $nameFile);
                // Verifica se NÃO deu certo o upload (Redireciona de volta)
                if (!$upload) {
                    return redirect()->back()->withInput()->with('message', 'Erro ao enviar o arquivo');
                }
            }
        } else {

            return redirect()->back()->withInput()->with('message', 'Extensão do arquivo deve ser .doc ou .docx');
        }

        //estrutura a array
        $dados = [
            'original_file' => $nameFile,
            'plano' => 'Plano "' . $plano['nome'] . '"',
            'titulo' => $dataForm['titulo'],
            'autores' => $dataForm['autores'],
            'paginas' => $plano['paginas'],
            'tamanho' => $plano['tamanho'],
            'exemplares' => $plano['exemplares'],
            'pb' => $plano['pb'],
            'pc' => $plano['pc'],
            'endereco_entrega' => 'Mesmo',
            'prazo' => $date->format('Y-m-d '),
            'observacao' => $dataForm['observacao'],
            'valor' => $plano['preco_total'],
            'preco_sugerido' => '',
            'notas' => '',
            'pago' => 0,
            'user_id' => Auth::user()->id,
            'status_projs_id' => $status['id']
        ];


        //insere no db
        $insert = $this->projeto->create($dados);
        if ($insert) {
            return redirect()->route('painel.home');
        } else {
            return redirect()->back()->withInput()->with('message', 'Houve um erro inesperado.');
        }
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

        if ($projeto->user_id == Auth::user()->id) {


            //procura a fase atual
            $fase = StatusProj::find($projeto->status_projs_id);
            //Busca a proxima fase
            $proxima_fase_db = StatusProj::where('ordem', $fase->ordem + 1)->first();
            //seleciona o nome da proxima fase
            if ($proxima_fase_db != null) {
                $proxima_fase = $proxima_fase_db->nome;
            } else {
                $proxima_fase = null;
            }

            return view('painel.projetos.show', compact('projeto', 'tituloPage', 'proxima_fase'));
        } else {
            abort(404, 'Página não encontrada!');
        }
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
        $dataForm['pago'] = (!isset($dataForm['pago']) ? 0 : 1);
        $update = $projeto->update($dataForm);

        if ($update)
            return redirect()->route('projetos.index');
        else
            return redirect()->route('projetos.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function custom() {
        $tituloPage = 'Criar Projeto personalizado';
        $customs = Custom::all();
        return view('site.custom', compact('tituloPage', 'customs'));
    }

    public function customstore(Request $request) {
        //Pega os dados do formulário
        $dataForm = $request->all();

        if ($request->paginas <  $request->pc) {
            return redirect()->back()->withInput()->with('message', 'O número de páginas coloridas não ser maior que o total de páginas. ');
        }

        //Procura o status no db
        $status = StatusProj::where('ordem', 0)->first();
        //calcula prazo
        $date = new DateTime('+45 day');
        //estrutura a array

        $custom = Custom::find($dataForm['custom'])->first();
        //Quantidade de páginas preto e branco
        $pb = $dataForm['paginas'] - $dataForm['pc'];

        $valor = ((($custom['pb'] * $pb) + ($custom['pc'] *
                $dataForm['pc']) + $custom['capa']) *
                $dataForm['exemplares']) + $custom['editoracao'];
//        print_r($valor);
//        
//extensão do arquivo
        $file_extension = $request->original_file->extension();

        //se a extensão do arquivo for doc e docx
        if ($file_extension == 'doc' || $file_extension == 'docx') {
            // Verifica se informou o arquivo e se é válido
            if ($request->hasFile('original_file') && $request->file('original_file')->isValid()) {
                // Define um aleatório para o arquivo baseado no timestamps atual
                $name = uniqid(Auth::user()->id . '-' . Auth::user()->name . '-' . date('d-m-Y-'));
                // Define finalmente o nome
                $nameFile = "{$name}.{$file_extension}";

                // Faz o upload:
                $upload = $request->original_file->storeAs('originais', $nameFile);
                // Verifica se NÃO deu certo o upload (Redireciona de volta)
                if (!$upload) {
                    return redirect()->back()->withInput()->with('message', 'Erro ao enviar o arquivo');
                }
            }
        } else {

            return redirect()->back()->withInput()->with('message', 'Extensão do arquivo deve ser .doc ou .docx');
        }

//        die();
        $dados = [
            'original_file' => $nameFile,
            'plano' => 'Plano Personalizado',
            'titulo' => $dataForm['titulo'],
            'autores' => $dataForm['autores'],
            'paginas' => $dataForm['paginas'],
            'tamanho' => $custom['tamanho'],
            'exemplares' => $dataForm['exemplares'],
            'endereco_entrega' => 'Mesmo',
            'pb' => $pb,
            'pc' => $dataForm['pc'],
            'prazo' => $date->format('Y-m-d '),
            'observacao' => $dataForm['observacao'],
            'valor' => $valor,
            'preco_sugerido' => '',
            'notas' => '',
            'pago' => 0,
            'user_id' => Auth::user()->id,
            'status_projs_id' => $status['id']
        ];


        //print_r($dados);
        //die();
        //verificação regras de negócio
        //Se paginas for maior que 300
        if ($dados['paginas'] > 300) {
            //insere no db
            $insert = $this->projeto->create($dados);
        }
        //se paginas menor que 300 mas tiver paginas coloridas
        elseif ($dados['pc'] > 0) {
            //insere no db
            $insert = $this->projeto->create($dados);
        }
        //se não, comparar com planos
        else {
            //se paginas informada for menor ou igual a 150
            if ($dados['paginas'] <= 150) {

                //procura o plano com pagina 150
                $plano = Plano::where('paginas', "150")->first();

                //altera dados
                $dados['paginas'] = $plano['paginas'];
                $dados['tamanho'] = $plano['tamanho'];
                $dados['valor'] = $plano['preco_total'];

                $insert = $this->projeto->create($dados);
            }
            //se paginas informada for menor ou igual a 200
            elseif ($dados['paginas'] <= 200) {
                $plano = Plano::where('paginas', "200")->first();
                $dados['paginas'] = $plano['paginas'];
                $dados['tamanho'] = $plano['tamanho'];
                $dados['valor'] = $plano['preco_total'];

                $insert = $this->projeto->create($dados);
            }
            //se paginas informada for menor ou igual a 300
            elseif ($dados['paginas'] <= 300) {
                $plano = Plano::where('paginas', "300")->first();
                $dados['paginas'] = $plano['paginas'];
                $dados['tamanho'] = $plano['tamanho'];
                $dados['valor'] = $plano['preco_total'];

                $insert = $this->projeto->create($dados);
            }
        }

        if ($insert)
            return redirect()->route('painel.home');
        else
            return redirect()->back()->withInput()->with('message', 'Nao foi possível criar projeto');
    }

}
