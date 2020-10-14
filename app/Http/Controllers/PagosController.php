<?php

namespace MiResidenciaEnLinea\Http\Controllers;

use Illuminate\Http\Request;
use MiResidenciaEnLinea\Pagos;
use MiResidenciaEnLinea\Mes;
use MiResidenciaEnLinea\Tiposdepagos;
use MiResidenciaEnLinea\Estatuspagos;
use MiResidenciaEnLinea\Coloniadatos;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //        
        //return view('residentes.Mispagos');
        $request->user()->authorizeRoles(['Residente']);  
        //$usuarios = User::all();
        if($request->ajax()){
            //$residencias = Residencia::with('usuario')->get();                 
            //$mispagos = Pagos::all();
            $mispagos = Pagos::with('mespagado','tipopago','estatus')->get();
            return response()->json($mispagos,200);
        }

        //return view('residencias.index',compact('usuarios'));
        return view('residentes.Mispagos');
    }

    public function Todoslosmeses(Request $request){
        
        $Todoslosmeses = Mes::all();
        return response()->json($Todoslosmeses,200);
    }

    public function ObtenerTiposdePago(Request $request){
        
        $tiposdepago = Tiposdepagos::all();
        return response()->json($tiposdepago,200);
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
        //return response()->json($request,200);
        if($request->ajax()){
            $pago = new Pagos();
            $diaactual = strlen(now());
            $pago->Folio = $request->input('PagoObject.Mes.Mes').$request->input("PagoObject.Fechadepago");
            $pago->descripcion =  $request->input('PagoObject.descripcion');

            $searchMonth = Mes::where('id',$request->input('PagoObject.Mes.id'))->first();
            $pago->mespagado()->associate($searchMonth);

            //return $searchMonth;

            $datoscolonia = Coloniadatos::firstOrFail();  
            $pago->Cantidad = $datoscolonia->AportacionMensual;

            $origDate = $request->input('PagoObject.Fechadepago');
            $newDate = date("Y-m-d", strtotime($origDate));
            $pago->Fechadepago = $newDate;

            

            $estatus = Estatuspagos::where('name','Pendiente')->first();
            $pago->estatus()->associate($estatus);

            $tipodepago = Tiposdepagos::where('id',$request->input('PagoObject.TipodePago.id'))->first();
            $pago->tipopago()->associate($tipodepago);
            //return $pago;
            
            $pago->save();
            $todoslospagos = Pagos::with('mespagado','tipopago','estatus')->get();            
            
            return response()->json([
                "message" => "pago agregado correctamente",
                "todoslospagos" => $todoslospagos
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
