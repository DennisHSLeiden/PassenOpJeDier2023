<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

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
            'name' => 'Dennis', //this will get id 1
            'email' => 'dennisleyting@gmail.com',
            'password' => '12345'
        ]);

        DB::table('users')->insert([
            'name' => 'Dino', //this will get id 2
            'email' => 'dinosaur@gmail.com',
            'password' => '12345'
        ]);
    }
}
