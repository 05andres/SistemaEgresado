<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->insert([
            'name' => 'Jhonier',
            'email' => 'jhonier1995@utp.edu.co',
            'password' => bcrypt('jhonier123'),
            'id_role' => 1, 
        ]);
    }
}
