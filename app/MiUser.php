<?php

namespace MiResidenciaEnLinea;

use Illuminate\Database\Eloquent\Model;

class MiUser extends Model
{
    //
    public function residencia(){
        return $this->belongsTo('MiResidenciaEnLinea\Residencia');
    } 
}
