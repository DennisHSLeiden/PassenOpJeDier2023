<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FotosHuisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fotos_huis')->insert([ // id =1
            // \Ramsey\Uuid\Uuid::uuid4()->toString()
            'user_id' => '1', //Refereert naar Dennis in usertable
            'titel' => 'Futuristisch huis',
            'src' => 'public\img\FuturistischHuis.jpg',
            'alt' => 'Een Futuristisch huis',
            'beschrijving' => 'Een Futuristisch huis. Je kan hier ook zien dat wij een grote tuin hebben'

        ]);
    }
}
