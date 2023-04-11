<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SoortenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('soorten')->insert([ //id=1
            'soort' => 'kat', 
        ]);
        DB::table('soorten')->insert([ //id=2
            'soort' => 'hond', 
        ]);
        DB::table('soorten')->insert([ //id=3
            'soort' => 'cavia', 
        ]);
        DB::table('soorten')->insert([ //id=4
            'soort' => 'rat', 
        ]);
        DB::table('soorten')->insert([ //id=5
            'soort' => 'konijn', 
        ]);
        DB::table('soorten')->insert([ //id=6
            'soort' => 'papagaai', 
        ]);
    }
}
