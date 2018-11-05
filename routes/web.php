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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::resource('/Almacen','AlmacenController');


//almacen
Route::get('Almacen',['as' => 'almacen','uses'=>'AlmacenController@index']);
Route::get('Almacen/create',['as' => 'almacen-create','uses'=>'AlmacenController@create']);
Route::post('Almacen/guardar',['as' => 'almacen-store','uses'=>'AlmacenController@store']);


// tienda
Route::get('Tienda',['as'=>'tienda','uses'=>'TiendaController@index']);
 Route::get('Tienda/create',['as' => 'tienda-create','uses'=>'TiendaController@create']);
  Route::get('Tienda/{idTienda}/edit',['as'=>'Tienda','uses'=>'ControllerClientes@edit']);


//roles
Route::get('rol',['as' => 'rol-index','uses'=>'RolController@index']);
Route::get('rol/create',['as' => 'rol-create','uses'=>'RolController@create']);
Route::post('rol/guardar',['as' => 'rol-guardar','uses'=>'RolController@store']);
Route::get('rol/editar/{id}',['as' => 'rol-editar','uses'=>'RolController@edit']);
Route::post('rol/update',['as' => 'rol-update','uses'=>'RolController@update']);
Route::get('rol/delete/{id}',['as' => 'rol-delete','uses'=>'RolController@destroy']);


// estado
Route::get('estado',['as' => 'estado-index','uses'=>'EstadoController@index']);
Route::get('estado/create',['as' => 'estado-create','uses'=>'EstadoController@create']);
Route::post('estado/guardar',['as' => 'estado-guardar','uses'=>'EstadoController@store']);
Route::get('estado/editar/{id}',['as' => 'estado-editar','uses'=>'EstadoController@edit']);
Route::post('estado/update',['as' => 'estado-update','uses'=>'EstadoController@update']);
Route::get('estado/delete/{id}',['as' => 'estado-delete','uses'=>'EstadoController@destroy']);

//tipo comprobante
Route::get('tipocomprobante',['as' => 'tipocomprobante','uses'=>'Tipo_ComprobanteController@index']);
Route::get('tipocomprobante/create',['as' => 'tipocomprobante-create','uses'=>'Tipo_ComprobanteController@create']);
Route::post('tipocomprobante/guardar',['as' => 'tipocomprobante-guardar','uses'=>'Tipo_ComprobanteController@store']);
Route::get('tipocomprobante/editar/{id}',['as' => 'tipocomprobante-editar','uses'=>'Tipo_ComprobanteController@edit']);
Route::post('tipocomprobante/update',['as' => 'tipocomprobante-update','uses'=>'Tipo_ComprobanteController@update']);
Route::get('tipocomprobante/delete/{id}',['as' => 'tipocomprobante-delete','uses'=>'Tipo_ComprobanteController@destroy']);

//tipo Tipo_ClienteController
Route::get('tipocliente',['as' => 'tipocliente','uses'=>'Tipo_ClienteController@index']);
Route::get('tipocliente/create',['as' => 'tipocliente-create','uses'=>'Tipo_ClienteController@create']);
Route::post('tipocliente/guardar',['as' => 'tipocliente-guardar','uses'=>'Tipo_ClienteController@store']);
Route::get('tipocliente/editar/{id}',['as' => 'tipocliente-editar','uses'=>'Tipo_ClienteController@edit']);
Route::post('tipocliente/update',['as' => 'tipocliente-update','uses'=>'Tipo_ClienteController@update']);
Route::get('tipocliente/delete/{id}',['as' => 'tipocliente-delete','uses'=>'Tipo_ClienteController@destroy']);



// tipo_producto
Route::get('tipoproducto',['as' => 'tipoproducto','uses'=>'Tipo_productoController@index']);
Route::get('tipoproducto/create',['as' => 'tipoproducto-create','uses'=>'Tipo_productoController@create']);
Route::post('tipoproducto/guardar',['as' => 'tipoproducto-guardar','uses'=>'Tipo_productoController@store']);
Route::get('tipoproducto/editar/{id}',['as' => 'tipoproducto-editar','uses'=>'Tipo_productoController@edit']);
Route::post('tipoproducto/update',['as' => 'tipoproducto-update','uses'=>'Tipo_productoController@update']);
Route::get('tipoproducto/delete/{id}',['as' => 'tipoproducto-delete','uses'=>'Tipo_productoController@destroy']);


// tipo ingreso
Route::get('tipoingreso',['as' => 'tipoingreso','uses'=>'Tipo_ingresoController@index']);
Route::get('tipoingreso/create',['as' => 'tipoingreso-create','uses'=>'Tipo_ingresoController@create']);
Route::post('tipoingreso/guardar',['as' => 'tipoingreso-guardar','uses'=>'Tipo_ingresoController@store']);
Route::get('tipoingreso/editar/{id}',['as' => 'tipoingreso-editar','uses'=>'Tipo_ingresoController@edit']);
Route::post('tipoingreso/update',['as' => 'tipoingreso-update','uses'=>'Tipo_ingresoController@update']);
Route::get('tipoingreso/delete/{id}',['as' => 'tipoingreso-delete','uses'=>'Tipo_ingresoController@destroy']);


 
// tipo tienda
Route::get('tipotienda',['as' => 'tipotienda','uses'=>'Tipo_tiendaController@index']);
Route::get('tipotienda/create',['as' => 'tipotienda-create','uses'=>'Tipo_tiendaController@create']);
Route::post('tipotienda/guardar',['as' => 'tipotienda-guardar','uses'=>'Tipo_tiendaController@store']);
Route::get('tipotienda/editar/{id}',['as' => 'tipotienda-editar','uses'=>'Tipo_tiendaController@edit']);
Route::post('tipotienda/update',['as' => 'tipotienda-update','uses'=>'Tipo_tiendaController@update']);
Route::get('tipotienda/delete/{id}',['as' => 'tipotienda-delete','uses'=>'Tipo_tiendaController@destroy']);



 
// tipo telefono
Route::get('tipotelefono',['as' => 'tipotelefono','uses'=>'Tipo_telefonoController@index']);
Route::get('tipotelefono/create',['as' => 'tipotelefono-create','uses'=>'Tipo_telefonoController@create']);
Route::post('tipotelefono/guardar',['as' => 'tipotelefono-guardar','uses'=>'Tipo_telefonoController@store']);
Route::get('tipotelefono/editar/{id}',['as' => 'tipotelefono-editar','uses'=>'Tipo_telefonoController@edit']);
Route::post('tipotelefono/update',['as' => 'tipotelefono-update','uses'=>'Tipo_telefonoController@update']);
Route::get('tipotelefono/delete/{id}',['as' => 'tipotelefono-delete','uses'=>'Tipo_telefonoController@destroy']);
