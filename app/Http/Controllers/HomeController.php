<?php

namespace MiResidenciaEnLinea\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$request->user()->authorizeRoles('SUPERADMIN','ADMIN','Residente','Seguridas')
        //return view('home');
        return view('/Administracion/DashboardAdmin');
    }
}
