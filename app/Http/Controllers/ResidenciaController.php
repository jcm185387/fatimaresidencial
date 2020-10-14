<?php

namespace MiResidenciaEnLinea\Http\Controllers;

use Illuminate\Http\Request;
use MiResidenciaEnLinea\Residencia;
use MiResidenciaEnLinea\User;

class ResidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['SUPERADMIN']);  
        //$usuarios = User::all();
        if($request->ajax()){
            $residencias = Residencia::with('usuario')->get();                 
            return response()->json($residencias,200);
        }

        //return view('residencias.index',compact('usuarios'));
        return view('residencias.index');

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
    //public function store(Residencia $residencia,Request $request)
    public function store(Request $request)
    {
        if($request->ajax()){
            $residencia = new Residencia();
            $residencia->Calle = $request->input('Calle');
            $residencia->Numero = $request->input('Numero');            
            $usr = User::find($request->input('Residente.id'));
            $residencia->usuario()->associate($usr)->save();
            return response()->json([
                "message" => "Residencia creada correctamente",
                "residencia" => $residencia
            ],200);            
        }
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
        return view('trainers.show',compact('trainer'));  
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
