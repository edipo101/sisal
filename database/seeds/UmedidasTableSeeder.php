<?php

use Illuminate\Database\Seeder;

class UmedidasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SIS\Umedida::create([
            'nombre' => 'Piezas',
            'prefijo'=>'pzas',
        ]);

        SIS\Umedida::create([
            'nombre' => 'Pie2',
            'prefijo'=>'pie2',
        ]);

        SIS\Umedida::create([
            'nombre' => 'Juegos',
            'prefijo'=>'juegos',
        ]);

        SIS\Umedida::create([
            'nombre' => 'Sin unidad de Medida',
            'prefijo'=>'s/u',
        ]);

        SIS\Umedida::create([
            'nombre' => 'Litros',
            'prefijo'=>'l',
        ]);

        SIS\Umedida::create([
            'nombre' => 'Metros',
            'prefijo'=>'m',
        ]);

        SIS\Umedida::create([
            'nombre' => 'Kilos',
            'prefijo'=>'K',
        ]);
        
        SIS\Umedida::create([
            'nombre' => 'Cajas',
            'prefijo'=>'cajas',
        ]);

        SIS\Umedida::create([
            'nombre' => 'Pares',
            'prefijo'=>'pares',
        ]);

        SIS\Umedida::create([
            'nombre' => 'Global',
            'prefijo'=>'global',
        ]);
    }
}
