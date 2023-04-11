<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class HuisdierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('huisdier')->insert([ //id #1
            'email' => 'dennisleyting@gmail.com', //Refereert naar Dennis in usertable
            'naam' => 'Otso',
            'soort' => 'Honestly dont know',
            'generieke_informatie' => 'Otso eet 3 maaltijden per dag, allemaal uit dezlfde zak, en drinkt 3 Liter water'
        ]);
        DB::table('huisdier')->insert([ //id #2
            'email' => 'dinosaur@gmail.com', //Refereert naar dino in usertable
            'naam' => 'Cooper',
            'soort' => 'Honestly dont know',
            'generieke_informatie' => 'Cooper eet 5 maaltijden per dag, allemaal uit verschillende zakken, en drinkt 3 Liter whiskey'
        ]);

        DB::table('huisdier')->insert([ //id #3
            'email' => 'dinosaur@gmail.com', //Refereert naar dino in usertable
            'naam' => 'Jacky',
            'soort' => 'Labradoodle',
            'generieke_informatie' => 'Jacky doet niks op een dag'
        ]);
    }
}
