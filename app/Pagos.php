<?php

namespace MiResidenciaEnLinea;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    //
    public function mespagado(){
        return $this->belongsTo('MiResidenciaEnLinea\Mes');
	} 

	public function tipopago(){
        return $this->belongsTo('MiResidenciaEnLinea\Tiposdepagos');
	} 

	public function estatus(){
        return $this->belongsTo('MiResidenciaEnLinea\Estatuspagos');
	} 
}
