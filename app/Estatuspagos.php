<?php

namespace MiResidenciaEnLinea;

use Illuminate\Database\Eloquent\Model;

class Estatuspagos extends Model
{
    //
	public function pagos(){
		return $this->hasMany('App\Pagos');
    }  
}
