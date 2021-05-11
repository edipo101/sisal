<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users
        Permission::create([
        	'name' => 'Listado de usuarios',
        	'slug' => 'users.index',
        	'description' => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
        	'name' => 'Creacion de usuario',
        	'slug' => 'users.create',
        	'description' => 'Crear un usuario al sistema',
        ]);
        Permission::create([
        	'name' => 'Edicion de usuario',
        	'slug' => 'users.edit',
        	'description' => 'Editar cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
        	'name' => 'Eliminar usuario',
        	'slug' => 'users.destroy',
        	'description' => 'Eliminar cualquier usuario del sistema',
        ]);
        Permission::create([
        	'name' => 'Perfil de usuario',
        	'slug' => 'users.perfil',
        	'description' => 'Visualizar perfil de usuario del sistema y poder cambiar password',
        ]);

        //Roles
        Permission::create([
        	'name' => 'Listado de roles',
        	'slug' => 'roles.index',
        	'description' => 'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
        	'name' => 'Creacion de rol',
        	'slug' => 'roles.create',
        	'description' => 'Crear un rol al sistema',
        ]);
        Permission::create([
        	'name' => 'Edicion de rol',
        	'slug' => 'roles.edit',
        	'description' => 'Editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
        	'name' => 'Eliminar rol',
        	'slug' => 'roles.destroy',
        	'description' => 'Eliminar cualquier rol del sistema',
        ]);

        //Empresa
		Permission::create([
			'name' => 'Configuracion Empresa',
			'slug' => 'empresas.index',
			'description' => 'Configurar Datos del perfil de la empresa',
		]);
		
		//Ingresos
		Permission::create([
			'name' => 'Ver listado de ingresos registrados',
			'slug' => 'ingresos.index',
			'description' => 'Mostrar datos de ingresos',
		]);
		Permission::create([
			'name' => 'Insertar ingreso',
			'slug' => 'ingresos.create',
			'description' => 'Insertar ingreso',
		]);
		Permission::create([
			'name' => 'Editar ingreso',
			'slug' => 'ingresos.edit',
			'description' => 'Editar ingreso',
		]);
		Permission::create([
			'name' => 'Eliminar ingreso',
			'slug' => 'ingresos.destroy',
			'description' => 'Eliminar ingreso',
		]);
		Permission::create([
			'name' => 'Ver datos de ingreso',
			'slug' => 'ingresos.show',
			'description' => 'Ver datos de ingreso',
		]);
		
		//Salidas
		Permission::create([
			'name' => 'Ver listado de salidas registrados',
			'slug' => 'salidas.index',
			'description' => 'Mostrar datos de salidas',
		]);
		Permission::create([
			'name' => 'Insertar salida',
			'slug' => 'salidas.create',
			'description' => 'Insertar salida',
		]);
		Permission::create([
			'name' => 'Editar salida',
			'slug' => 'salidas.edit',
			'description' => 'Editar salida',
		]);
		Permission::create([
			'name' => 'Eliminar salida',
			'slug' => 'salidas.destroy',
			'description' => 'Eliminar salida',
		]);
		Permission::create([
			'name' => 'Ver datos de salida',
			'slug' => 'salidas.show',
			'description' => 'Ver datos de salida',
		]);
		
		//productos
		Permission::create([
			'name' => 'Ver listado de productos registrados',
			'slug' => 'productos.index',
			'description' => 'Mostrar datos de productos',
		]);
		Permission::create([
			'name' => 'Insertar producto',
			'slug' => 'productos.create',
			'description' => 'Insertar producto',
		]);
		Permission::create([
			'name' => 'Editar producto',
			'slug' => 'productos.edit',
			'description' => 'Editar producto',
		]);
		Permission::create([
			'name' => 'Eliminar producto',
			'slug' => 'productos.destroy',
			'description' => 'Eliminar producto',
		]);
		Permission::create([
			'name' => 'Ver datos de producto',
			'slug' => 'productos.show',
			'description' => 'Ver datos de producto',
		]);
		
		//Alamcens
		Permission::create([
			'name' => 'Ver listado de almacenes registrados',
			'slug' => 'almacenes.index',
			'description' => 'Mostrar datos de almacenes',
		]);
		Permission::create([
			'name' => 'Insertar almacen',
			'slug' => 'almacenes.create',
			'description' => 'Insertar almacen',
		]);
		Permission::create([
			'name' => 'Editar almacen',
			'slug' => 'almacenes.edit',
			'description' => 'Editar almacen',
		]);
		Permission::create([
			'name' => 'Eliminar almacen',
			'slug' => 'almacenes.destroy',
			'description' => 'Eliminar almacen',
		]);
		Permission::create([
			'name' => 'Ver datos de almacen',
			'slug' => 'almacenes.show',
			'description' => 'Ver datos de almacen',
		]);
		Permission::create([
			'name' => 'Ver datos de varios almacenes',
			'slug' => 'almacenes.varios',
			'description' => 'Muestrar datos de multiples almacenes',
		]);

		//Categorias
		Permission::create([
			'name' => 'Ver listado de categorias registrados',
			'slug' => 'categorias.index',
			'description' => 'Mostrar datos de categorias',
		]);
		Permission::create([
			'name' => 'Insertar categoria',
			'slug' => 'categorias.create',
			'description' => 'Insertar categoria',
		]);
		Permission::create([
			'name' => 'Editar categoria',
			'slug' => 'categorias.edit',
			'description' => 'Editar categoria',
		]);
		Permission::create([
			'name' => 'Eliminar categoria',
			'slug' => 'categorias.destroy',
			'description' => 'Eliminar categoria',
		]);
		Permission::create([
			'name' => 'Ver datos de categoria',
			'slug' => 'categorias.show',
			'description' => 'Ver datos de categoria',
		]);
		
		//Unidades
		Permission::create([
			'name' => 'Ver listado de unidades de medida registrados',
			'slug' => 'umedidas.index',
			'description' => 'Mostrar datos de unidades de medida',
		]);
		Permission::create([
			'name' => 'Insertar unidad de medida',
			'slug' => 'umedidas.create',
			'description' => 'Insertar unidad de medida',
		]);
		Permission::create([
			'name' => 'Editar unidad de medida',
			'slug' => 'umedidas.edit',
			'description' => 'Editar unidad de medida',
		]);
		Permission::create([
			'name' => 'Eliminar unidad de medida',
			'slug' => 'umedidas.destroy',
			'description' => 'Eliminar unidad de medida',
		]);
		Permission::create([
			'name' => 'Ver datos de unidad de medida',
			'slug' => 'umedidas.show',
			'description' => 'Ver datos de unidad de medida',
		]);
		
		//Funcionarios
		Permission::create([
			'name' => 'Ver listado de funcionarios registrados',
			'slug' => 'funcionarios.index',
			'description' => 'Mostrar datos de funcionarios',
		]);
		Permission::create([
			'name' => 'Insertar funcionario',
			'slug' => 'funcionarios.create',
			'description' => 'Insertar funcionario',
		]);
		Permission::create([
			'name' => 'Editar funcionario',
			'slug' => 'funcionarios.edit',
			'description' => 'Editar funcionario',
		]);
		Permission::create([
			'name' => 'Eliminar funcionario',
			'slug' => 'funcionarios.destroy',
			'description' => 'Eliminar funcionario',
		]);
		Permission::create([
			'name' => 'Ver datos de funcionario',
			'slug' => 'funcionarios.show',
			'description' => 'Ver datos de funcionario',
		]);
		
		//Proveedores
		Permission::create([
			'name' => 'Ver listado de proveedors registrados',
			'slug' => 'proveedors.index',
			'description' => 'Mostrar datos de proveedors',
		]);
		Permission::create([
			'name' => 'Insertar proveedor',
			'slug' => 'proveedors.create',
			'description' => 'Insertar proveedor',
		]);
		Permission::create([
			'name' => 'Editar proveedor',
			'slug' => 'proveedors.edit',
			'description' => 'Editar proveedor',
		]);
		Permission::create([
			'name' => 'Eliminar proveedor',
			'slug' => 'proveedors.destroy',
			'description' => 'Eliminar proveedor',
		]);
		Permission::create([
			'name' => 'Ver datos de proveedor',
			'slug' => 'proveedors.show',
			'description' => 'Ver datos de proveedor',
		]);
		
		//Destinos
		Permission::create([
			'name' => 'Ver listado de destinos registrados',
			'slug' => 'destinos.index',
			'description' => 'Mostrar datos de destinos',
		]);
		Permission::create([
			'name' => 'Insertar destino',
			'slug' => 'destinos.create',
			'description' => 'Insertar destino',
		]);
		Permission::create([
			'name' => 'Editar destino',
			'slug' => 'destinos.edit',
			'description' => 'Editar destino',
		]);
		Permission::create([
			'name' => 'Eliminar destino',
			'slug' => 'destinos.destroy',
			'description' => 'Eliminar destino',
		]);
		Permission::create([
			'name' => 'Ver datos de destino',
			'slug' => 'destinos.show',
			'description' => 'Ver datos de destino',
		]);
		
		//Areas
		Permission::create([
			'name' => 'Ver listado de areas registrados',
			'slug' => 'areas.index',
			'description' => 'Mostrar datos de areas',
		]);
		Permission::create([
			'name' => 'Insertar area',
			'slug' => 'areas.create',
			'description' => 'Insertar area',
		]);
		Permission::create([
			'name' => 'Editar area',
			'slug' => 'areas.edit',
			'description' => 'Editar area',
		]);
		Permission::create([
			'name' => 'Eliminar area',
			'slug' => 'areas.destroy',
			'description' => 'Eliminar area',
		]);
		Permission::create([
			'name' => 'Ver datos de area',
			'slug' => 'areas.show',
			'description' => 'Ver datos de area',
		]);

		//Reportes
		Permission::create([
			'name' => 'Ver reportes',
			'slug' => 'reportes.index',
			'description' => 'ver reportes',
		]);
		Permission::create([
			'name' => 'Ver listado de productos',
			'slug' => 'kardexs.index',
			'description' => 'Mostrar datos de productos',
		]);
    }
}
