<?php

namespace App\Http\Controllers\PanelCliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PainelController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        //$this->middleware('auth:admin',['except' => 'index']);
    }
    public function home() {
        $title = 'Listagem de páginas';

        return view('painel.home', compact('pages', 'title'));
    }
}
