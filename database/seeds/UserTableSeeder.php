<?php

use Illuminate\Database\Seeder;
use MiResidenciaEnLinea\Role;
use MiResidenciaEnLinea\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_Superadmin = Role::where('NombreRol','SUPERADMIN')->first();
        $role_admin = Role::where('NombreRol','ADMIN')->first();
        $role_residente = Role::where('NombreRol','Residente')->first();

        $user = new User();
        $user->name = "UserSuperAdmin";
        $user->email = "UserSuperAdmin@mail.com";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_Superadmin);

        $user = new User();
        $user->name = "UserAdmin";
        $user->email = "UserAdmin@mail.com";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = "Soy un residente";
        $user->email = "residente@mail.com";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_residente);
    }
}
