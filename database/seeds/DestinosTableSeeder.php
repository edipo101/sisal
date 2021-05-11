<?php

use Illuminate\Database\Seeder;

class DestinosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SIS\Destino::class,30)->create();
    }
}
