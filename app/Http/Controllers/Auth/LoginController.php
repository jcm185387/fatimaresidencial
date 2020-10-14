<?php

namespace MiResidenciaEnLinea\Http\Controllers\Auth;

use MiResidenciaEnLinea\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
    //protected $redirectTo = '/trainers';
    //protected $redirectTo = '/Administracion/DashboardAdmin';
    public function authenticated($request , $user){
        

        
        //return $user->roles->pluck('NombreRol');

        
        
        if(($user->roles->pluck('NombreRol'))[0]=='SUPERADMIN'){ // Para el superadministrador
            return redirect()->route('superadmin.dashboard'); // Para el administrador de la colonia
            //return redirect('/Administracion/DashboardSuperadmin')
        }elseif (($user->roles->pluck('NombreRol'))[0]=='ADMIN') {
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('residente.dashboard') ;//pendiente
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
