<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusProj;

class AdminController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $statusProjs = StatusProj::orderBy('ordem', 'ASC')->get();
       
        return view('admin.admin', compact('statusProjs'));
    }

}
