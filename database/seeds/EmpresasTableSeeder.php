<?php

use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        SIS\Empresa::create([
			'nombre' => 'GOBIERNO AUTONOMO MUNICIPAL DE SUCRE DEL ESTADO PLURINACIONAL DE BOLIVIA',
			'sigla' => 'GOBIERNO AUTONOMO MUNICIPAL DE SUCRE',
			'slogan' => 'GESTION CON OBRAS',
			'logo' => 'gams.jpg',
			'direccion' => 'AV. DEL EJERCITO 152',
			'zona' => 'PALACETE MUNICPAL EL GUEREO',
			'telefono' => '64-56185 / 64-39769',
			'email' => 'gamsucre@sucre.bo'
		]);
    }
}
