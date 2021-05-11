<?php

use Illuminate\Database\Seeder;
use SIS\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Agregando secretarias
        Area::create([
        	'nombre' => 'Despacho Municipal',
        ]);
        Area::create([
        	'nombre' => 'Secretaria Municipal de Turismo y Cultura',
        ]);
        Area::create([
        	'nombre' => 'Secretaria Municipal de Salud Educación y Deportes',
        ]);
        Area::create([
        	'nombre' => 'Secretaria Municipal de Desarrollo Humano y Social',
        ]);
        Area::create([
        	'nombre' => 'Secretaria Municipal Administrativa y Financiera',
        ]);
        Area::create([
        	'nombre' => 'Secretaria Municipal de Infraestructura Pública',
        ]);
        Area::create([
        	'nombre' => 'Secretaria Municipal de Ordenamiento Territorial',
        ]);
        Area::create([
        	'nombre' => 'Secretaria Municipal de Planificación para el Desarrollo',
        ]);
        Area::create([
        	'nombre' => 'Secretaria Municipal General y de Gobernabilidad',
        ]);
        Area::create([
        	'nombre' => 'Secretaria Municipal de Desarrollo Económico',
        ]);
    }
}
