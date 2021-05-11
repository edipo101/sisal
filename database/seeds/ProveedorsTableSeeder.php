<?php

use Illuminate\Database\Seeder;

class ProveedorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SIS\Proveedor::class,60)->create();
    }
}
