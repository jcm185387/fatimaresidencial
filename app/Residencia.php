<?php

namespace MiResidenciaEnLinea;

use Illuminate\Database\Eloquent\Model;

class Residencia extends Model
{
    //
    public function usuario(){
        return $this->belongsTo('MiResidenciaEnLinea\User');
	} 
}
