<?php

namespace MiResidenciaEnLinea\Http\Controllers;

use Illuminate\Http\Request;
use MiResidenciaEnLinea\User;
use MiResidenciaEnLinea\Role;
use MiResidenciaEnLinea\Residencia;

class ResidenteController extends Controller
{
    //
    public function index(Request $request){
/*    	$request->user()->authorizeRoles(['ADMIN']);
    	return view('residentes.index');*/

/*        if($request->ajax()){
            return 'no mames';
        }else{
            return 'ni mergas';
        }*/

       $request->user()->authorizeRoles(['ADMIN']);
        if($request->ajax()){
            //$residencias = Residencia::with('usuario.roles')->get();
            //$residencias = Residencia::all();
            $residencias = Residencia::with('usuario.roles')->get();                 
            return response()->json($residencias,200);
        }
        return view('residentes.index');




/*        $residencias = Residencia::with('usuario.roles')->get();             
        return response()->json($residencias,200);
        return view('residentes.index');*/
    }

    public function usuariosporRol(User $user,Request $request){
        
        $usuariosporRol = User::with('roles')->get();
        $usuarios = [];
        foreach ($usuariosporRol as $key => $value) {
            # code...
            if($value->roles[0]->NombreRol == $request->NombreRol){
                array_push($usuarios, $value);
            }
        }     
        return $usuarios; 
    }

    public function rolesnoAdministradores(Request $request){
        
        $roles = Role::where('NombreRol','<>','ADMIN')->where('NombreRol','<>','SUPERADMIN')->get();
        return $roles; 
    }


    //pendiente por programar
    public function store(Request $request)
    {

        //return response()->json($request->input('DatosObject.Usuario',200));
        if($request->ajax()){
            $user = new User();
            $user->name =  $request->input('DatosObject.Usuario.name');
            $user->email =  $request->input('DatosObject.Usuario.email');
            $user->password = bcrypt('query');
            $user->save();
            $saverol = Role::where('NombreRol',$request->input('DatosObject.Usuario.Rol.NombreRol'))->first();
            //$user->roles()->attach($request->input('Datos.Usuario.Rol'));
            $user->roles()->attach($saverol);

            $residencia = new Residencia();
            $residencia->Calle = $request->input('DatosObject.Direccion.Calle');
            $residencia->Numero = $request->input('DatosObject.Direccion.Numero');
            $residencia->Telefono = $request->input('DatosObject.Direccion.Telefono');

            
            $usr = User::find($user->id);

            $residencia->usuario()->associate($usr)->save();
            //return response()->json($residencia,200);

            $todasresidencias = Residencia::with('usuario.roles')->get();                 
            
            return response()->json([
                "message" => "Residente creado correctamente",
                //"residencia" => $residencia
                "residencias" => $todasresidencias
            ],200);
        }
    }
}
