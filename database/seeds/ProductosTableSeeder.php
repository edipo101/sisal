<?php

use Illuminate\Database\Seeder;
use SIS\Producto;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Producto::class, 20)->create();
    }
}
