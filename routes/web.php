<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('trainers','TrainerController');
//Route::resource('pokemons','PokemonController');
Route::get('trainers/{trainer}/pokemons','PokemonController@index');
Route::post('trainers/{trainer}/pokemons','PokemonController@store');


//Route::resource('residentes','ResidenteController');
//Route::resource('residentes','ResidenteController');
Route::get('usuariosporRol','ResidenteController@UsuariosporRol'); 
// se quitan, la vista residencias se transformará en la vista residentes

 //obtener los todos los roles disponibles

Route::get('rolesnoAdministradores','ResidenteController@rolesnoAdministradores'); 
//End


Route::get('residentes','ResidenteController@index');
Route::post('residentes','ResidenteController@store');

Route::get('residencias','ResidenciaController@index');
Route::post('residencias','ResidenciaController@store');


Auth::routes();


/*Route::get('/Administracion/DashboardAdmin', function (){
    return view('/Administracion/DashboardAdmin');
})->name('admin.dashboard'); // <--- este es el nombre que busca el controlador.*/


Route::get('DashboardAdmin', array('as' => 'admin.dashboard', 'uses' => 'AdministracionController@DashboardAdmin'));


/*Route::get('/Administracion/DashboardSuperadmin', function (){		
    return view('/Administracion/DashboardSuperAdmin');
})->name('superadmin.dashboard'); // <--- este es el nombre que busca el controlador.*/

Route::get('DashboardSuperadmin', array('as' => 'superadmin.dashboard', 'uses' => 'AdministracionController@DashboardSuperadmin'));



// Rutas Administrador
// Ruta para configurar datos de la colonia
//Route::resource('/Administracion/ConfiguracionColonia','AdministracionController');

Route::get('ConfiguracionColonia','AdministracionController@index');
Route::get('infocoloniar','AdministracionController@infocoloniar');

Route::get('GetDatosColonia','AdministracionController@GetDatosColonia');

//RUTAS RESIDENTE
/*Route::get('/Administracion/DashboardResidente', function (){	
    return view('/Administracion/DashboardResidente');
})->name('residente.dashboard'); // <--- este es el nombre que busca el controlador.*/

Route::get('DashboardResidente', array('as' => 'residente.dashboard', 'uses' => 'AdministracionController@DashboardResidente'));

//Rutas residente

Route::get('Mispagos','PagosController@index');
Route::post('Mispagos','PagosController@store');

Route::get('Todoslosmeses','PagosController@Todoslosmeses');
Route::get('ObtenerTiposdePago','PagosController@ObtenerTiposdePago');
Route::post('ActualizardatosColonia','AdministracionController@ActualizardatosColonia');