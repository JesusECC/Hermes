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

// Route::get('/', function () {
//     return view('home');
// });

// Auth::routes();

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/',['as' => 'principal','uses'=>'HomeController@principal']);

    
    Route::get('/home', 'HomeController@index')->name('home');
    
    //almacen
    Route::get('Almacen',['as' => 'almacen','uses'=>'AlmacenController@index']);
    Route::get('Almacen/create',['as' => 'almacen-create','uses'=>'AlmacenController@create']);
    Route::post('Almacen/guardar',['as' => 'almacen-store','uses'=>'AlmacenController@store']);
    Route::get('Almacen/editar/{id}',['as' => 'almacen-editar','uses'=>'AlmacenController@edit']);
    Route::post('Almacen/update/{id}',['as' => 'almacen-update','uses'=>'AlmacenController@update']);
    Route::get('Almacen/delete/{id}',['as' => 'almacen-delete','uses'=>'AlmacenController@destroy']);
    Route::post('Almacen/departamento',['as'=>'almacen-departamento','uses'=>'AlmacenController@provincia']);
    Route::post('Almacen/distrito',['as'=>'almacen-distrito','uses'=>'AlmacenController@distrito']);


    // tienda
    Route::get('Tienda',['as'=>'tienda','uses'=>'TiendaController@index']);
     Route::get('Tienda/create',['as' => 'tienda-create','uses'=>'TiendaController@create']);
     Route::post('Tienda/guardar',['as' => 'tienda-store','uses'=>'TiendaController@store']);
     Route::get('Tienda/editar/{id}',['as' => 'tienda-editar','uses'=>'TiendaController@edit']);
     Route::post('Tienda/update/{id}',['as' => 'tienda-update','uses'=>'TiendaController@update']);
    Route::get('Tienda/delete/{id}',['as' => 'tienda-delete','uses'=>'TiendaController@destroy']);
     Route::get('Tienda/delete/{id}',['as' => 'tienda-delete','uses'=>'TiendaController@destroy']);
       Route::post('Tienda/departamento',['as'=>'tienda-departamento','uses'=>'TiendaController@provincia']);
    Route::post('Tienda/distrito',['as'=>'tienda-distrito','uses'=>'TiendaController@distrito']);


    //Route::get('trabajador/create',['as' => 'persona-create','uses'=>'TrabajadorController@create']);
    //   Route::get('Tienda/{idTienda}/edit',['as'=>'Tienda','uses'=>'ControllerClientes@edit']);
    
    //Taller
    Route::get('Taller',['as'=>'taller','uses'=>'TallerController@index']);
    Route::get('Taller/create',['as' => 'taller-create','uses'=>'TallerController@create']);
    Route::post('Taller/guardar',['as' => 'taller-store','uses'=>'TallerController@store']);
    Route::get('Taller/editar/{id}',['as' => 'taller-editar','uses'=>'TallerController@edit']);
    Route::post('Taller/update/{id}',['as' => 'taller-update','uses'=>'TallerController@update']);
    Route::get('Taller/delete/{id}',['as' => 'taller-delete','uses'=>'TallerController@destroy']);
     Route::post('Taller/departamento',['as'=>'taller-departamento','uses'=>'ProveedorController@provincia']);
    Route::post('Taller/distrito',['as'=>'taller-distrito','uses'=>'ProveedorController@distrito']);


    //proveedor
    Route::get('Proveedor',['as'=>'proveedor','uses'=>'ProveedorController@index']);
    Route::get('Proveedor/create',['as' => 'proveedor-create','uses'=>'ProveedorController@create']);
    Route::post('Proveedor/guardar',['as' => 'proveedor-store','uses'=>'ProveedorController@store']);
    Route::get('Proveedor/editar/{id}',['as' => 'proveedor-editar','uses'=>'ProveedorController@edit']);
    Route::post('Proveedor/update/{id}',['as' => 'proveedor-update','uses'=>'ProveedorController@update']);
    Route::get('Proveedor/delete/{id}',['as' => 'proveedor-delete','uses'=>'ProveedorController@destroy']);
    Route::post('Proveedor/departamento',['as'=>'proveedor-departamento','uses'=>'ProveedorController@provincia']);
    Route::post('Proveedor/distrito',['as'=>'proveedor-distrito','uses'=>'ProveedorController@distrito']);
    
    
    

    
    //roles
    Route::get('rol',['as' => 'rol-index','uses'=>'RolController@index']);
    Route::get('rol/create',['as' => 'rol-create','uses'=>'RolController@create']);
    Route::post('rol/guardar',['as' => 'rol-guardar','uses'=>'RolController@store']);
    Route::get('rol/editar/{id}',['as' => 'rol-editar','uses'=>'RolController@edit']);
    Route::post('rol/update',['as' => 'rol-update','uses'=>'RolController@update']);
    Route::get('rol/delete/{id}',['as' => 'rol-delete','uses'=>'RolController@destroy']);

    //Reporte
    Route::get('reporte',['as' => 'rol-reporte','uses'=>'ReporteController@index']);
    Route::get('reporte/pdf','ReporteController@pdf')->name('reportes.pdf');
    
    
    
    // estado
    Route::get('estado',['as' => 'estado-index','uses'=>'EstadoController@index']);
    Route::get('estado/create',['as' => 'estado-create','uses'=>'EstadoController@create']);
    Route::post('estado/guardar',['as' => 'estado-guardar','uses'=>'EstadoController@store']);
    Route::get('estado/editar/{id}',['as' => 'estado-editar','uses'=>'EstadoController@edit']);
    
    Route::post('estado/update/{id}',['as' => 'estado-update','uses'=>'EstadoController@update']);
    Route::get('estado/delete/{id}',['as' => 'estado-delete','uses'=>'EstadoController@destroy']);
    
    // tipo documento
    Route::get('documento',['as' => 'documento-index','uses'=>'Tipo_documentoController@index']);
    Route::get('documento/create',['as' => 'documento-create','uses'=>'Tipo_documentoController@create']);
    Route::post('documento/guardar',['as' => 'documento-guardar','uses'=>'Tipo_documentoController@store']);
    Route::get('documento/editar/{id}',['as' => 'documento-editar','uses'=>'Tipo_documentoController@edit']);
    Route::post('documento/update/{id}',['as' => 'documento-update','uses'=>'Tipo_documentoController@update']);
    Route::get('documento/delete/{id}',['as' => 'documento-delete','uses'=>'Tipo_documentoController@destroy']);
    
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
    
    //producto
    Route::get('producto',['as' => 'producto','uses'=>'ProductoController@index']);
    Route::get('producto/create',['as' => 'producto-create','uses'=>'ProductoController@create']);
    Route::post('producto/',['as' => 'producto-guardar','uses'=>'ProductoController@store']);
    Route::get('producto/editar/{id}',['as' => 'producto-editar','uses'=>'ProductoController@edit']);
    Route::post('producto/update',['as' => 'producto-update','uses'=>'ProductoController@update']);
    Route::get('producto/delete/{id}',['as' => 'producto-delete','uses'=>'ProductoController@destroy']);

    //detalle_producto
    Route::get('detalle_producto',['as' => 'detalle_producto','uses'=>'Producto_DetalleController@index']);
    Route::get('detalle_producto/create',['as' => 'detalle_producto-create','uses'=>'Producto_DetalleController@create']);
    Route::post('detalle_producto/',['as' => 'detalle_producto-guardar','uses'=>'Producto_DetalleController@store']);
    Route::get('detalle_producto/editar/{id}',['as' => 'detalle_producto-editar','uses'=>'Producto_DetalleController@edit']);
    Route::post('detalle_producto/update',['as' => 'detalle_producto-update','uses'=>'Producto_DetalleController@update']);
    Route::get('detalle_producto/delete/{id}',['as' => 'detalle_producto-delete','uses'=>'Producto_DetalleController@destroy']);
    
    
    // tipo_producto-->error
    Route::get('tipoproducto',['as' => 'tipoproducto','uses'=>'Tipo_productoController@index']);
    Route::get('tipoproducto/create',['as' => 'tipoproducto-create','uses'=>'Tipo_productoController@create']);
    Route::post('tipoproducto/guardar',['as' => 'tipoproducto-guardar','uses'=>'Tipo_productoController@store']);
    Route::get('tipoproducto/editar/{id}',['as' => 'tipoproducto-editar','uses'=>'Tipo_productoController@edit']);
    Route::post('tipoproducto/update',['as' => 'tipoproducto-update','uses'=>'Tipo_productoController@update']);
    Route::get('tipoproducto/delete/{id}',['as' => 'tipoproducto-delete','uses'=>'Tipo_productoController@destroy']);
    
    //ingreso-->error
    Route::get('ingreso',['as' => 'ingreso','uses'=>'Ingreso_Podructo_FinalController@index']);
    Route::get('ingreso/create',['as' => 'ingreso-create','uses'=>'Ingreso_Podructo_FinalController@create']);
    Route::post('ingreso/guardar',['as' => 'ingreso-guardar','uses'=>'Ingreso_Podructo_FinalController@store']);
    Route::get('ingreso/editar/{id}',['as' => 'ingreso-editar','uses'=>'Ingreso_Podructo_FinalController@edit']);
    Route::post('ingreso/update',['as' => 'ingreso-update','uses'=>'Ingreso_Podructo_FinalController@update']);
    Route::get('ingreso/delete/{id}',['as' => 'ingreso-delete','uses'=>'Ingreso_Podructo_FinalController@destroy']);
    // ajax de ingreso
    Route::post('ingreso/barras',['as'=>'ingreso-cod','uses'=>'Ingreso_Podructo_FinalController@codBarra']);
    //ingresoMP
    
    Route::get('ingresoMP',['as' => 'ingresoMP','uses'=>'Ingreso_Materia_PrimaController@index']);
    Route::get('ingresoMP/create',['as' => 'ingresoMP-create','uses'=>'Ingreso_Materia_PrimaController@create']);
    Route::post('ingresoMP/guardar',['as' => 'ingresoMP-guardar','uses'=>'Ingreso_Materia_PrimaController@store']);
    Route::get('ingresoMP/editar/{id}',['as' => 'ingresoMP-editar','uses'=>'Ingreso_Materia_PrimaController@edit']);
    Route::post('ingresoMP/update',['as' => 'ingresoMP-update','uses'=>'Ingreso_Materia_PrimaController@update']);
    Route::get('ingresoMP/delete/{id}',['as' => 'ingresoMP-delete','uses'=>'Ingreso_Materia_PrimaController@destroy']);
    
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
    
    //color
    Route::get('color',['as'=> 'color-index','uses'=>'ColorController@index']);
    Route::get('color/create',['as'=>'color-create','uses'=>'ColorController@create']);
    Route::post('color/guardar',['as'=>'color-guardar','uses'=>'ColorController@store']);
    Route::get('color/editar/{id}',['as'=>'color-edit','uses'=>'ColorController@edit']);
    Route::post('color/upadte',['as'=>'color-update','uses'=>'ColorController@update']);
    Route::get('color/delete/{id}',['as'=>'color-delete','uses'=>'ColorController@destroy']);
    
    //talla
    Route::get('talla',['as'=>'talla-index','uses'=>'TallasController@index']);
    Route::get('talla/create',['as'=>'talla-create','uses'=>'TallasController@create']);
    Route::post('talla/guardar',['as'=>'talla-guardar','uses'=>'TallasController@store']);
    Route::get('talla/editar/{id}',['as'=>'talla-edit','uses'=>'TallasController@edit']);
    Route::post('talla/update',['as'=>'talla-update','uses'=>'TallasController@update']);
    Route::get('tall/delete/{id}',['as'=>'talla-delete','uses'=>'TallasController@destroy']);
    
    
    //tipo_salida
    Route::get('tipo_salida',['as'=>'tipo_salida-index','uses'=>'Tipo_salidaController@index']);
    Route::get('tipo_salida/create',['as'=>'tipo_salida-create','uses'=>'Tipo_salidaController@create']);
    Route::post('tipo_salida/guardar',['as'=>'tipo_salida-guardar','uses'=>'Tipo_salidaController@store']);
    Route::get('tipo_salida/editar/{id}',['as'=>'tipo_salida-edit','uses'=>'Tipo_salidaController@edit']);
    Route::post('tipo_salida/update',['as'=>'tipo_salida-update','uses'=>'Tipo_salidaController@update']);
    Route::get('tipo_salida/delete/{id}',['as'=>'tipo_salida-delete','uses'=>'Tipo_salidaController@destroy']);
    
    
    //tipo_salida_mp
    Route::get('tipo_salida_mp',['as'=>'tipo_salida_mp-index','uses'=>'Tipo_salida_MPController@index']);
    Route::get('tipo_salida_mp/create',['as'=>'tipo_salida_mp-create','uses'=>'Tipo_salida_MPController@create']);
    Route::post('tipo_salida_mp/guardar',['as'=>'tipo_salida_mp-guardar','uses'=>'Tipo_salida_MPController@store']);
    Route::get('tipo_salida_mp/editar/{id}',['as'=>'tipo_salida_mp-edit','uses'=>'Tipo_salida_MPController@edit']);
    Route::post('tipo_salida_mp/update',['as'=>'tipo_salida_mp-update','uses'=>'Tipo_salida_MPController@update']);
    Route::get('tipo_salida_mp/delete/{id}',['as'=>'tipo_salida_mp-delete','uses'=>'Tipo_salida_MPController@destroy']);
    
    
    //salida
    Route::get('salida',['as'=>'salida-index','uses'=>'SalidaController@index']);
    Route::get('salida/create',['as'=>'salida-create','uses'=>'SalidaController@create']);
    Route::post('salida/guardar',['as'=>'salida-guardar','uses'=>'SalidaController@store']);
    Route::get('salida/editar/{id}',['as'=>'salida-edit','uses'=>'SalidaController@edit']);
    Route::post('salida/update',['as'=>'salida-update','uses'=>'SalidaController@update']);
    Route::get('salida/delete/{id}',['as'=>'salida-delete','uses'=>'SalidaController@destroy']);
    // ajax de salida
    Route::post('salida/barras',['as'=>'salida-cod','uses'=>'SalidaController@codBarra']);
    
    //salidaVenta
    Route::get('salidaVenta',['as'=>'salidaVenta-index','uses'=>'SalidaVentaController@index']);
    Route::get('salidaVenta/create',['as'=>'salidaVenta-create','uses'=>'SalidaVentaController@create']);
    Route::post('salidaVenta/guardar',['as'=>'salidaVenta-guardar','uses'=>'SalidaVentaController@store']);
    Route::get('salidaVenta/editar/{id}',['as'=>'salidaVenta-edit','uses'=>'SalidaVentaController@edit']);
    Route::post('salidaVenta/update',['as'=>'salidaVenta-update','uses'=>'SalidaVentaController@update']);
    Route::get('salidaVenta/delete/{id}',['as'=>'salidaVenta-delete','uses'=>'SalidaVentaController@destroy']);
    // ajax de salidaventa
    Route::post('salidaVenta/barras',['as'=>'salidaVenta-cod','uses'=>'SalidaVentaController@codBarra']);
    Route::get('salidaVenta/show/{id}',['as'=>'salidaVenta-show','uses'=>'SalidaVentaController@show']);

    
    
    //operador
    Route::get('operador',['as'=>'operador-index','uses'=>'operadorController@index']);
    Route::get('operador/create',['as'=>'operador-create','uses'=>'operadorController@create']);
    Route::post('operador/guardar',['as'=>'operador-guardar','uses'=>'operadorController@store']);
    Route::get('operador/editar/{id}',['as'=>'operador-edit','uses'=>'operadorController@edit']);
    Route::post('operador/update',['as'=>'operador-update','uses'=>'operadorController@update']);
    Route::get('operador/delete/{id}',['as'=>'operador-delete','uses'=>'operadorController@destroy']);
    
    //cliente
    Route::get('cliente',['as'=>'cliente-index','uses'=>'ClienteController@index']);
    Route::get('cliente/create',['as'=>'cliente-create','uses'=>'ClienteController@create']);
    Route::post('cliente/guardar',['as'=>'cliente-guardar','uses'=>'ClienteController@store']);
    Route::get('cliente/editar/{id}',['as'=>'cliente-edit','uses'=>'ClienteController@edit']);
    Route::post('cliente/update/{id}',['as'=>'cliente-update','uses'=>'ClienteController@update']);
    Route::get('cliente/delete/{id}',['as'=>'cliente-delete','uses'=>'ClienteController@destroy']);
    
    // rutas para ajax
    Route::post('cliente/departamento',['as'=>'cliente-departamento','uses'=>'ClienteController@provincia']);
    Route::post('cliente/distrito',['as'=>'cliente-distrito','uses'=>'ClienteController@distrito']);
    
    
    Route::get('ajustes',['as'=>'ajustes-index','uses'=>'AjustesController@index']);
    
    // persona -> Trabajador 
    Route::get('trabajador',['as' => 'persona-index','uses'=>'TrabajadorController@index']);
    Route::get('trabajador/create',['as' => 'persona-create','uses'=>'TrabajadorController@create']);
    Route::post('trabajador/guardar',['as' => 'persona-guardar','uses'=>'TrabajadorController@store']);
    Route::get('trabajador/editar/{id}',['as' => 'persona-editar','uses'=>'TrabajadorController@edit']);
    Route::post('trabajador/update/{id}',['as' => 'persona-update','uses'=>'TrabajadorController@update']);
    Route::get('trabajador/delete/{id}',['as' => 'persona-delete','uses'=>'TrabajadorController@destroy']);
    
    // users usuarios
    Route::get('usuarios',['as' => 'usuarios-index','uses'=>'usersController@index']);
    Route::get('usuarios/create',['as' => 'usuarios-create','uses'=>'usersController@create']);
    Route::post('usuarios/guardar',['as' => 'usuarios-guardar','uses'=>'usersController@store']);
    Route::get('usuarios/editar/{id}',['as' => 'usuarios-editar','uses'=>'usersController@edit']);
    Route::post('usuarios/update/{id}',['as' => 'usuarios-update','uses'=>'usersController@update']);
    Route::get('usuarios/delete/{id}',['as' => 'usuarios-delete','uses'=>'usersController@destroy']);

   //cerrar sesion
   Route::post('logout',['as'=> 'logout','uses'=>'Auth\LoginController@logout']);
});
 // rutas para login 
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login',['as' => 'login-user','uses'=>'Auth\LoginController@login']);
// Route::post('login/envio', 'Auth\LoginController@login');
// Route::post('logout',['as'=> 'logout','uses'=>'Auth\LoginController@logout']);
// // Registration Routes...
// if ($options['register'] ?? true) {
//     $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//     $this->post('register', 'Auth\RegisterController@register');
// }
// // Password Reset Routes...
// $this->get('password/reset', 'Auth\ForgotPasswordController@login')->name('password.request');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// $this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
// // Email Verification Routes...
// if ($options['verify'] ?? false) {
//     $this->emailVerification();
// }
    
