<?php

use Illuminate\Database\Seeder;
use MiResidenciaEnLinea\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$role = new Role();
    	$role->NombreRol = "SUPERADMIN";
    	$role->descripcion = "SuperAdministrador";
    	$role->save();

    	$role = new Role();
    	$role->NombreRol = "ADMIN";
    	$role->descripcion = "Administrador";
    	$role->save();

    	$role = new Role();
    	$role->NombreRol = "Residente";
    	$role->descripcion = "Persona que vive en la colonia";
    	$role->save();

    	$role = new Role();
    	$role->NombreRol = "Seguridad";
    	$role->descripcion = "Personal de seguridad";
    	$role->save();

        $role = new Role();
        $role->NombreRol = "Tesorero";
        $role->descripcion = "Administra el dinero de la colonia";
        $role->save();

        $role = new Role();
        $role->NombreRol = "Secretario";
        $role->descripcion = "Puede enviar comunicados";
        $role->save();

        $role = new Role();
        $role->NombreRol = "Vocal";
        $role->descripcion = "Administra el dinero de la colonia";
        $role->save();
    }
}
