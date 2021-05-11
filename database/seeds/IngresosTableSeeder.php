<?php

use Illuminate\Database\Seeder;

class IngresosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SIS\Ingreso::class,50)->create();
        factory(SIS\DetalleIngreso::class,50)->create();
    }
}
