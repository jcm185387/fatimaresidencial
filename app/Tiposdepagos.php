<?php

namespace MiResidenciaEnLinea;

use Illuminate\Database\Eloquent\Model;

class Tiposdepagos extends Model
{
    //
	public function pagos(){
		return $this->hasMany('App\Pagos');
    }  
}
