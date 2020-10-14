<?php

namespace MiResidenciaEnLinea\Http\Controllers;

use Illuminate\Http\Request;
use MiResidenciaEnLinea\Coloniadatos;
use MiResidenciaEnLinea\Residencia;

class AdministracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index(DatosColonia $datoscolonia,Request $request)
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['ADMIN']);  
        if($request->ajax()){
            //$datoscolonia = Coloniadatos::firstOrFail();            
            $todosdatoscolonia = Coloniadatos::all()->count();
            if($todosdatoscolonia  == 0){
                $datoscolonia = Coloniadatos::all();
            }else{
                $datoscolonia = Coloniadatos::firstOrFail();            
            }
            return response()->json($datoscolonia,200);
        }
        return view('Administracion.ConfiguracionColonia');
    }

    public function infocoloniar(Request $request)
    {
        $request->user()->authorizeRoles(['Residente']);  
        if($request->ajax()){
            //$datoscolonia = Coloniadatos::firstOrFail();            
            $todosdatoscolonia = Coloniadatos::all()->count();
            if($todosdatoscolonia  == 0){
                $datoscolonia = Coloniadatos::all();
            }else{
                $datoscolonia = Coloniadatos::firstOrFail();            
            }
            return response()->json($datoscolonia,200);
        }
        return view('Administracion.infoColoniaResidente');
    }

    public function DashboardSuperadmin(Request $request)
    {
        $request->user()->authorizeRoles(['SUPERADMIN']);  
        return view('Administracion.DashboardSuperadmin');
    }

    public function DashboardAdmin(Request $request)
    {
        $request->user()->authorizeRoles(['ADMIN']);  
        return view('Administracion.DashboardAdmin');
    }

    public function DashboardResidente(Request $request)
    {
        $request->user()->authorizeRoles(['Residente']);  
        return view('Administracion.DashboardResidente');
    }

    public function ActualizardatosColonia(Request $request)
    {

        //return response()->json($request->get('enviocorreo',200));
        if($request->ajax()){
            $filescount = Coloniadatos::all()->count();
            if($filescount == 0){
                $datos = new Coloniadatos();
            }else{
                $datos = Coloniadatos::firstOrFail();     
            }
            
            if($datos == null){
                $datos = new Coloniadatos();
            }
            if($request->hasFile('Logo')){
                $file = $request->file('Logo');            
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/images/',$name);
                $datos->Logo = $name;
            }

            $datos->NombreColonia = $request->input('NombreColonia');
            $datos->Direccion = $request->input('Direccion');
            $datos->Telefono = $request->input('Telefono');
            $datos->AportacionMensual = $request->input('AportacionMensual');
            $datos->email_colonia = $request->input('email_colonia');
            //$datos->enviocorreo = $request->input('enviocorreo');
            if($request->input('enviocorreo') == 'true'){
                $datos->enviocorreo = true;   
            }elseif ($request->input('enviocorreo') == 'false') {
                $datos->enviocorreo = false;
            }
            //$datos->enviocorreo = ($request->input('enviocorreo')) === true ? true : false;

            $datos->save(); 

            $datoscolonia = Coloniadatos::firstOrFail(); 
            return response()->json([
                "message" => "La información de la colonia fue actualizada correctamente",
                "datoscolonia" => $datoscolonia
            ],200);            
        }
    }

    public function GetDatosColonia(Request $request)
    { 
        //if($request->ajax()){
            //$datoscolonia = Coloniadatos::firstOrFail();            
            $todosdatoscolonia = Coloniadatos::all()->count();
            if($todosdatoscolonia  == 0){
                $datoscolonia = Coloniadatos::all();
            }else{
                $datoscolonia = Coloniadatos::firstOrFail();            
            }
            return response()->json($datoscolonia,200);
        //}
        /*return view('Administracion.ConfiguracionColonia');*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //return view('administracion.show',compact('administracion'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
