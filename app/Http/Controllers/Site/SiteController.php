<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plano;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller {

    public function home() {

        $planos = Plano::all();
        return view('site.home', compact('planos'));
    }

    public function about() {

        return view('site.about');
    }

    public function contato() {

        return view('site.contato');
    }

    public function servicos() {

        return view('site.servicos');
    }

    public function page() {
        return view('site.page');
    }

    public function publique() {
        $planos = Plano::all();
        return view('site.publique', compact('planos'));
    }

}
