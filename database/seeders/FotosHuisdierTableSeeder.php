<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FotosHuisdierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fotos_huisdier')->insert([ // deze foto krijgt id 1
            'huisdier_id' => '1', //Refereert naar Otso in HuisdierTableSeeder
            'titel' => 'Otso',
            'src' => 'public\img\Otso.jpg',
            'alt' => 'Een foto van Otso',
            'beschrijving' => 'Hier kan je een foto van een slapende Otso zien op een bank met een dekentje'
        ]);
    }
}
