<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AlmacensTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(EmpresasTableSeeder::class);
		$this->call(UmedidasTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(AreasTableSeeder::class);
    }
}
