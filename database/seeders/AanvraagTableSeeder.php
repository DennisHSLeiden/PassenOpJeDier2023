<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AanvraagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //51b668f8-ad31-11ed-afa1-0242ac120002
        DB::table('aanvraag')->insert([//id =1
            'huisdier_id' => '1', //Refereert naar Otso in HuisdierTableSeeder
            'wanneer' => 'Ik heb een sitter nodig vanaf middag 3 tot middag 18 maart',
            'prijs' => '20 cent',
        ]);

        DB::table('aanvraag')->insert([//id =1
            'huisdier_id' => '2', //Refereert naar Cooper in HuisdierTableSeeder
            'wanneer' => 'Morgen',
            'prijs' => '30 euro',
        ]);

        

    }
}
