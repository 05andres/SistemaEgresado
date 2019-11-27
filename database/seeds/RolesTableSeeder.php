<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'root',
            'description' => 'Todos los permisos',
        ]);

        DB::table('roles')->insert([
            'name' => 'admin',
            'description' => 'Algunos permisos',
        ]);

        DB::table('roles')->insert([
            'name' => 'egresado',
            'description' => 'Solo visualización',
        ]);
}
}
