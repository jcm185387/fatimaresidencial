<?php

namespace MiResidenciaEnLinea;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
	protected $fillable = ['name','avatar','descripcion'];

    //
	    /**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'slug';
	}

	public function pokemons(){
		return $this->hasMany('MiResidenciaEnLinea\Pokemon');
	} 
}
