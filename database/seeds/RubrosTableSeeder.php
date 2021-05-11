<?php

use Illuminate\Database\Seeder;

class RubrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SIS\Rubro::create([
        	'nombre' => 'Conductor',
        ]);
        SIS\Rubro::create([
        	'nombre' => 'Mecanico',
        ]);
    }
}
