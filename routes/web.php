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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Rutas para el modulo de ingresos
//Route::resource('ingresos', 'IngresoController');
Route::get('ingresos', 'IngresoController@index')->name('ingresos.index')->middleware('permission:ingresos.index');
Route::get('ingresos/create', 'IngresoController@create')->name('ingresos.create')->middleware('permission:ingresos.create');
Route::post('ingresos/store', 'IngresoController@store')->name('ingresos.store')->middleware('permission:ingresos.create');
Route::get('ingresos/{ingreso}/edit', 'IngresoController@edit')->name('ingresos.edit')->middleware('permission:ingresos.edit');
Route::put('ingresos/{ingreso}', 'IngresoController@update')->name('ingresos.update')->middleware('permission:ingresos.edit');
Route::delete('ingresos/{ingreso}/delete', 'IngresoController@destroy')->name('ingresos.destroy')->middleware('permission:ingresos.destroy');
Route::get('ingresos/{ingreso}/show', 'IngresoController@show')->name('ingresos.show')->middleware('permission:ingresos.show');

// Rutas para el modulo de salidas
//Route::resource('salidas', 'SalidaController');
Route::get('salidas', 'SalidaController@index')->name('salidas.index')->middleware('permission:salidas.index');
Route::get('salidas/create', 'SalidaController@create')->name('salidas.create')->middleware('permission:salidas.create');
Route::post('salidas/store', 'SalidaController@store')->name('salidas.store')->middleware('permission:salidas.create');
Route::get('salidas/{salida}/edit', 'SalidaController@edit')->name('salidas.edit')->middleware('permission:salidas.edit');
Route::put('salidas/{salida}', 'SalidaController@update')->name('salidas.update')->middleware('permission:salidas.edit');
Route::delete('salidas/{salida}/delete', 'SalidaController@destroy')->name('salidas.destroy')->middleware('permission:salidas.destroy');
Route::get('salidas/{salida}/show', 'SalidaController@show')->name('salidas.show')->middleware('permission:salidas.show');

// Rutas para el modulo de productos
//Route::resource('productos', 'ProductoController');
Route::get('productos', 'ProductoController@index')->name('productos.index')->middleware('permission:productos.index');
Route::get('productos/create', 'ProductoController@create')->name('productos.create')->middleware('permission:productos.create');
Route::post('productos/store', 'ProductoController@store')->name('productos.store')->middleware('permission:productos.create');
Route::get('productos/{producto}/edit', 'ProductoController@edit')->name('productos.edit')->middleware('permission:productos.edit');
Route::put('productos/{producto}', 'ProductoController@update')->name('productos.update')->middleware('permission:productos.edit');
Route::delete('productos/{producto}/delete', 'ProductoController@destroy')->name('productos.destroy')->middleware('permission:productos.destroy');
Route::get('productos/{producto}/show', 'ProductoController@show')->name('productos.show')->middleware('permission:productos.show');


Route::group(['prefix'=> 'configuracion'], function(){
	// Rutas para el modulo de empresa
	Route::get('empresas', 'EmpresaController@index')->name('empresas.index')->middleware('permission:empresas.index');
	Route::post('empresas/store', 'EmpresaController@store')->name('empresas.store')->middleware('permission:empresas.index');
  	Route::post('empresas/{empresa}/upload','EmpresaController@upload')->name('empresas.upload')->middleware('permission:empresas.index');
	
	// Rutas para el modulo de categorias
	//Route::resource('categorias', 'CategoriaController');
	Route::get('categorias', 'CategoriaController@index')->name('categorias.index')->middleware('permission:categorias.index');
	Route::get('categorias/create', 'CategoriaController@create')->name('categorias.create')->middleware('permission:categorias.create');
	Route::post('categorias/store', 'CategoriaController@store')->name('categorias.store')->middleware('permission:categorias.create');
	Route::get('categorias/{categoria}/edit', 'CategoriaController@edit')->name('categorias.edit')->middleware('permission:categorias.edit');
	Route::put('categorias/{categoria}', 'CategoriaController@update')->name('categorias.update')->middleware('permission:categorias.edit');
	Route::delete('categorias/{categoria}/delete', 'CategoriaController@destroy')->name('categorias.destroy')->middleware('permission:categorias.destroy');
	Route::get('categorias/{categoria}/show', 'CategoriaController@show')->name('categorias.show')->middleware('permission:categorias.show');

	// Rutas para el modulo de unidades de medida
	Route::get('umedidas', 'UmedidaController@index')->name('umedidas.index')->middleware('permission:umedidas.index');
	Route::get('umedidas/create', 'UmedidaController@create')->name('umedidas.create')->middleware('permission:umedidas.create');
	Route::post('umedidas/store', 'UmedidaController@store')->name('umedidas.store')->middleware('permission:umedidas.create');
	Route::get('umedidas/{umedida}/edit', 'UmedidaController@edit')->name('umedidas.edit')->middleware('permission:umedidas.edit');
	Route::put('umedidas/{umedida}', 'UmedidaController@update')->name('umedidas.update')->middleware('permission:umedidas.edit');
	Route::delete('umedidas/{umedida}/delete', 'UmedidaController@destroy')->name('umedidas.destroy')->middleware('permission:umedidas.destroy');
	Route::get('umedidas/{umedida}/show', 'UmedidaController@show')->name('umedidas.show')->middleware('permission:umedidas.show');
	
	// Rutas para el modulo de rubros
	Route::get('rubros', 'RubroController@index')->name('rubros.index')->middleware('permission:rubros.index');
	Route::get('rubros/create', 'RubroController@create')->name('rubros.create')->middleware('permission:rubros.create');
	Route::post('rubros/store', 'RubroController@store')->name('rubros.store')->middleware('permission:rubros.create');
	Route::get('rubros/{rubro}/edit', 'RubroController@edit')->name('rubros.edit')->middleware('permission:rubros.edit');
	Route::put('rubros/{rubro}', 'RubroController@update')->name('rubros.update')->middleware('permission:rubros.edit');
	Route::delete('rubros/{rubro}/delete', 'RubroController@destroy')->name('rubros.destroy')->middleware('permission:rubros.destroy');
	
	// Rutas para el modulo de funcionarios
	Route::get('funcionarios', 'FuncionarioController@index')->name('funcionarios.index')->middleware('permission:funcionarios.index');
	Route::get('funcionarios/create', 'FuncionarioController@create')->name('funcionarios.create')->middleware('permission:funcionarios.create');
	Route::post('funcionarios/store', 'FuncionarioController@store')->name('funcionarios.store')->middleware('permission:funcionarios.create');
	Route::get('funcionarios/{funcionario}/edit', 'FuncionarioController@edit')->name('funcionarios.edit')->middleware('permission:funcionarios.edit');
	Route::put('funcionarios/{funcionario}', 'FuncionarioController@update')->name('funcionarios.update')->middleware('permission:funcionarios.edit');
	Route::delete('funcionarios/{funcionario}/delete', 'FuncionarioController@destroy')->name('funcionarios.destroy')->middleware('permission:funcionarios.destroy');
	Route::get('funcionarios/{funcionario}', 'FuncionarioController@show')->name('funcionarios.show')->middleware('permission:funcionarios.show');
	
	// Rutas para el modulo de proveedores
	Route::get('proveedors', 'ProveedorController@index')->name('proveedors.index')->middleware('permission:proveedors.index');
	Route::get('proveedors/{proveedor}/show', 'ProveedorController@show')->name('proveedors.show')->middleware('permission:proveedors.show');
	Route::get('proveedors/create', 'ProveedorController@create')->name('proveedors.create')->middleware('permission:proveedors.create');
	Route::post('proveedors/store', 'ProveedorController@store')->name('proveedors.store')->middleware('permission:proveedors.create');
	Route::get('proveedors/{proveedor}/edit', 'ProveedorController@edit')->name('proveedors.edit')->middleware('permission:proveedors.edit');
	Route::put('proveedors/{proveedor}', 'ProveedorController@update')->name('proveedors.update')->middleware('permission:proveedors.edit');
	Route::delete('proveedors/{proveedor}/delete', 'ProveedorController@destroy')->name('proveedors.destroy')->middleware('permission:proveedors.destroy');
	
	// Rutas para el modulo de destinos
	Route::get('destinos', 'DestinoController@index')->name('destinos.index')->middleware('permission:destinos.index');
	Route::get('destinos/create', 'DestinoController@create')->name('destinos.create')->middleware('permission:destinos.create');
	Route::post('destinos/store', 'DestinoController@store')->name('destinos.store')->middleware('permission:destinos.create');
	Route::get('destinos/{destino}/edit', 'DestinoController@edit')->name('destinos.edit')->middleware('permission:destinos.edit');
	Route::get('destinos/{destino}/show', 'DestinoController@show')->name('destinos.show')->middleware('permission:destinos.show');
	Route::put('destinos/{destino}', 'DestinoController@update')->name('destinos.update')->middleware('permission:destinos.edit');
	Route::delete('destinos/{destino}/delete', 'DestinoController@destroy')->name('destinos.destroy')->middleware('permission:destinos.destroy');

	// Rutas para el modulo de areas
	//Route::resource('areas', 'AreaController');
	Route::get('areas', 'AreaController@index')->name('areas.index')->middleware('permission:areas.index');
	Route::get('areas/create', 'AreaController@create')->name('areas.create')->middleware('permission:areas.create');
	Route::post('areas/store', 'AreaController@store')->name('areas.store')->middleware('permission:areas.create');
	Route::get('areas/{area}/edit', 'AreaController@edit')->name('areas.edit')->middleware('permission:areas.edit');
	Route::get('areas/{area}/show', 'AreaController@show')->name('areas.show')->middleware('permission:areas.show');
	Route::put('areas/{area}', 'AreaController@update')->name('areas.update')->middleware('permission:areas.edit');
	Route::delete('areas/{area}/delete', 'AreaController@destroy')->name('areas.destroy')->middleware('permission:areas.destroy');

	// Rutas para el modulo de almacenes
	//Route::resource('almacenes', 'AlmacenController');
	Route::get('almacenes', 'AlmacenController@index')->name('almacenes.index')->middleware('permission:almacenes.index');
	Route::get('almacenes/create', 'AlmacenController@create')->name('almacenes.create')->middleware('permission:almacenes.create');
	Route::post('almacenes/store', 'AlmacenController@store')->name('almacenes.store')->middleware('permission:almacenes.create');
	Route::get('almacenes/{almacen}/edit', 'AlmacenController@edit')->name('almacenes.edit')->middleware('permission:almacenes.edit');
	Route::put('almacenes/{almacen}', 'AlmacenController@update')->name('almacenes.update')->middleware('permission:almacenes.edit');
	Route::delete('almacenes/{almacen}/delete', 'AlmacenController@destroy')->name('almacenes.destroy')->middleware('permission:almacenes.destroy');
	Route::get('almacenes/{almacen}/show', 'AlmacenController@show')->name('almacenes.show')->middleware('permission:almacenes.show');
});


Route::group(['prefix' => 'administracion'], function(){
	// Rutas para el modulo de usuarios
	Route::get('users', 'UserController@index')->name('users.index')->middleware('permission:users.index');
	Route::get('users/create', 'UserController@create')->name('users.create')->middleware('permission:users.create');
	Route::post('users/store', 'UserController@store')->name('users.store')->middleware('permission:users.create');
	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:users.edit');
	Route::put('users/{user}', 'UserController@update')->name('users.update')->middleware('permission:users.edit');
	Route::delete('users/{user}/delete', 'UserController@destroy')->name('users.destroy')->middleware('permission:users.destroy');

	// Rutas para el modulo de roles
	Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('permission:roles.index');
	Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:roles.create');
	Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:roles.create');
	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:roles.edit');
	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:roles.edit');
	Route::delete('roles/{role}/delete', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');
});

// Rutas para cambiar el password del usuario
Route::get('/perfil','UserController@perfil')->name('users.perfil')->middleware('permission:users.perfil');
Route::put('users/{user}/password','UserController@updatepassword')->name('users.updatepassword')->middleware('permission:users.perfil');

// Rutas para las api para los datatables
Route::get('api/users','UserController@apiUsers')->name('users.apiUsers')->middleware('permission:users.index');
Route::get('api/roles','RoleController@apiRoles')->name('roles.apiRoles')->middleware('permission:roles.index');
Route::get('api/categorias','CategoriaController@apiCategorias')->name('categorias.apiCategorias')->middleware('permission:categorias.index');
Route::get('api/umedidas','UmedidaController@apiUmedidas')->name('umedidas.apiUmedidas')->middleware('permission:umedidas.index');
Route::get('api/rubros','RubroController@apiRubros')->name('rubros.apiRubros')->middleware('permission:rubros.index');
Route::get('api/funcionarios','FuncionarioController@apiFuncionarios')->name('funcionarios.apiFuncionarios')->middleware('permission:funcionarios.index');
Route::get('api/proveedors','ProveedorController@apiProveedors')->name('proveedors.apiProveedors')->middleware('permission:proveedors.index');
Route::get('api/destinos','DestinoController@apiDestinos')->name('destinos.apiDestinos')->middleware('permission:destinos.index');
Route::get('api/areas','AreaController@apiAreas')->name('areas.apiAreas')->middleware('permission:areas.index');
Route::get('api/almacenes','AlmacenController@apiAlmacenes')->name('almacenes.apiAlmacenes')->middleware('permission:almacenes.index');
Route::get('api/ingresos','IngresoController@apiIngresos')->name('ingresos.apiIngresos')->middleware('permission:ingresos.index');
Route::get('api/salidas','SalidaController@apiSalidas')->name('salidas.apiSalidas')->middleware('permission:salidas.index');
Route::get('api/productos','ProductoController@apiProductos')->name('productos.apiProductos')->middleware('permission:productos.index');
Route::get('api/kardexs','ReporteController@apiKardexs')->name('kardexs.apiKardexs')->middleware('permission:kardexs.index');

//Rutas para ultimos cambios
Route::get('productos/lista/{id_almacen}/almacen','ProductoController@getProductoAlmacen')->name('productos.ProductosAlmacen');

//Rutas para los reportes
Route::get('productos/almacen/{id}/cantidad', 'ProductoController@getCantidadAlmacen');
Route::get('productos/listar/{id}/{c}/{p}/producto', 'ProductoController@getProducto');
Route::get('ingresos/detalle/{id}/ingreso', 'IngresoController@getDetalleIngreso');
Route::get('ingresos/cantidad/{id}/{idproducto}/producto', 'IngresoController@getProductoCantidad');
Route::get('ingresos/detalle/producto/{id}/{destino_id}/destino', 'IngresoController@getDetalleIngresoDestino');
Route::get('ingresos/producto/{destino_id}/destino', 'IngresoController@getDetalleDestino');

Route::get('ingresos/reporte/{id}/ingreso', [
	'uses' => 'IngresoController@reporteingreso',
	'as' => 'ingresos.reporteingreso'
]);

Route::get('salidas/reporte/{id}/salida', [
	'uses' => 'SalidaController@reportesalida',
	'as' => 'salidas.reportesalida'
]);

Route::get('reportes',[
	'uses' => 'ReporteController@index',
	'as' => 'reportes.index'
]);
Route::get('reportes/productos',[
	'uses' => 'ReporteController@productosAlmacen',
	'as' => 'reportes.productos'
]);
Route::get('reportes/kardex',[
	'uses' => 'ReporteController@kardexProducto',
	'as' => 'reportes.kardex'
]);
Route::get('reportes/kardex/{id}/informe',[
	'uses' => 'ReporteController@informeProducto',
	'as' => 'reportes.informe'
]);
