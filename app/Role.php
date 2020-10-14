<?php

namespace MiResidenciaEnLinea;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public function user(){
    	return $this->belongs(Tomany('MiResidenciaEnLinea\User'));
    }
}
