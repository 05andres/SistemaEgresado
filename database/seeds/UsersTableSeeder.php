<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

        DB::table('users')->insert([
            'name' => 'Jhonier',
            'email' => 'jhonier1994@utp.edu.co',
            'password' => bcrypt('jhonier12345'),
            'id_role' => 3, 
        ]);
    }
}
