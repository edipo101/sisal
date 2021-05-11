<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SIS\Categoria::create([
            'nombre' => 'Sin Categoria',
            'descripcion'=>'Item sin clasificacion a una categoria'
        ]);
    }
}
