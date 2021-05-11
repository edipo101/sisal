<?php

use Illuminate\Database\Seeder;

class SalidasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SIS\Salida::class,50)->create();
        factory(SIS\DetalleSalida::class,50)->create();
    }
}
