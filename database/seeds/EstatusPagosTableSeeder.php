<?php

use Illuminate\Database\Seeder;
use MiResidenciaEnLinea\Estatuspagos;

class EstatusPagosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $estatus = new Estatuspagos();
        $estatus->name ="Aprobada";
        $estatus->descripcion ="Fue aprobado el pago";
        $estatus->save();

        $estatus = new Estatuspagos();
        $estatus->name ="Rechazada";
        $estatus->descripcion ="Fue rechazado el pago";
        $estatus->save();

        $estatus = new Estatuspagos();
        $estatus->name ="Pendiente";
        $estatus->descripcion ="Aún por aprobar el pago";
        $estatus->save();
    }
}
