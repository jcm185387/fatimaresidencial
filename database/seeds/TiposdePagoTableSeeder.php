<?php

use Illuminate\Database\Seeder;
use MiResidenciaEnLinea\Tiposdepagos;

class TiposdePagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipos = new Tiposdepagos();
        $tipos->nombre ="Transferencia";
        $tipos->descripcion ="Vía electrónica";
        $tipos->save();

        $tipos = new Tiposdepagos();
        $tipos->nombre ="Depósito";
        $tipos->descripcion ="Vía oxxo o similar";
        $tipos->save();

        $tipos = new Tiposdepagos();
        $tipos->nombre ="Efectivo";
        $tipos->descripcion ="Es entregado al administrador de la colonia";
        $tipos->save();
    }
}
