<?php

use Illuminate\Database\Seeder;

class AlmacensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SIS\Almacen::create([
            'nombre' => 'Principal'
        ]);
    }
}
