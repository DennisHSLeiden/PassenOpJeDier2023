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
        DB::table('aanvraag')->insert([//id = 1
            'huisdier_id' => '1', //Refereert naar Otso in HuisdierTableSeeder
            'wanneer' => 'Morgen',
            'prijs' => '30 euro',
            'beschikbaar' => false,
            'email_oppasser' => 'dinosaur@gmail.com'
        ]);

        DB::table('aanvraag')->insert([//id = 2
            'huisdier_id' => '2', //Refereert naar Cooper in HuisdierTableSeeder
            'wanneer' => 'Morgen',
            'prijs' => '30 euro',
            'beschikbaar' => false,
            'email_oppasser' => 'dennisleyting@gmail.com'
        ]);

        DB::table('aanvraag')->insert([//id = 3
            'huisdier_id' => '1', //Refereert naar Otso in HuisdierTableSeeder
            'wanneer' => 'Ik heb een sitter nodig vanaf middag 3 tot middag 18 maart',
            'prijs' => '20 cent',
        ]);

        DB::table('aanvraag')->insert([//id = 4
            'huisdier_id' => '2', //Refereert naar Cooper in HuisdierTableSeeder
            'wanneer' => 'Morgen',
            'prijs' => '30 euro',
        ]);

        DB::table('aanvraag')->insert([//id = 5
            'huisdier_id' => '3', //Refereert naar Jacky in HuisdierTableSeeder
            'wanneer' => 'Volgende week',
            'prijs' => '45 euro',
        ]);

        DB::table('aanvraag')->insert([//id = 6
            'huisdier_id' => '4', //Refereert naar Monster in HuisdierTableSeeder
            'wanneer' => 'Gisteren',
            'prijs' => '30 euro per dag',
        ]);
        DB::table('aanvraag')->insert([//id = 6
            'huisdier_id' => '5', //Refereert naar Monster in HuisdierTableSeeder
            'wanneer' => '29 februari',
            'prijs' => '100 euro',
        ]);
        DB::table('aanvraag')->insert([//id = 7
            'huisdier_id' => '1', //Refereert naar Otso in HuisdierTableSeeder
            'wanneer' => 'Gisteren',
            'prijs' => '30 euro per dag',
            'beschikbaar' => false,
            'email_oppasser' => 'dinosaur@gmail.com'
        ]);
        DB::table('aanvraag')->insert([//id = 8
            'huisdier_id' => '2', //Refereert naar Cooper in HuisdierTableSeeder
            'wanneer' => 'Gisteren',
            'prijs' => '30 euro per dag',
            'beschikbaar' => false,
            'email_oppasser' => 'dennisleyting@gmail.com'
        ]);


        

        

    }
}
