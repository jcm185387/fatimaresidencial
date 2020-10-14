<?php

namespace MiResidenciaEnLinea;

use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
    //
	public function pagos(){
		return $this->hasMany('MiResidenciaEnLinea\Pagos');
    } 
}
