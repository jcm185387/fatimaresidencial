<?php

use Illuminate\Database\Seeder;
use MiResidenciaEnLinea\Mes;

class MesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$mes = new Mes();
    	$mes->Mes = "Enero";
    	$mes->save();

    	$mes = new Mes();
    	$mes->Mes = "Febrero";
    	$mes->save();

    	$mes = new Mes();
    	$mes->Mes = "Marzo";
    	$mes->save();

    	$mes = new Mes();
    	$mes->Mes = "Abril";
    	$mes->save();

    	$mes = new Mes();
    	$mes->Mes = "Mayo";
    	$mes->save();

    	$mes = new Mes();
    	$mes->Mes = "Junio";
    	$mes->save();

    	$mes = new Mes();
    	$mes->Mes = "Julio";
    	$mes->save();

    	$mes = new Mes();
    	$mes->Mes = "Agosto";
    	$mes->save();

    	$mes = new Mes();
    	$mes->Mes = "Septiembre";
    	$mes->save();

    	$mes = new Mes();
    	$mes->Mes = "Octubre";
    	$mes->save();

    	$mes = new Mes();
    	$mes->Mes = "Noviembre";
    	$mes->save();

    	$mes = new Mes();
    	$mes->Mes = "Diciembre";
    	$mes->save();
    }
}
