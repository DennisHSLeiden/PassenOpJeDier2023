<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ExtraUserInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('extra_user_information')->insert([
            'user_id' => '1', //this references Dennis in users
            'voornaam' => 'Dennis',
            'achternaam' => 'Leyting',
            'telefoonnummer' => '0637425868',
            'geboortedatum' => '2002-04-09',
            'woonplaats' => 'Delft',
            'straat'=> 'Keverling Buismanweg',
            'huisnummer'=> '38'
        ]);

        DB::table('extra_user_information')->insert([
            'user_id' => '2', //this references Dino in users
            'voornaam' => 'Dino',
            'achternaam' => 'Saur',
            'telefoonnummer' => '0612345678',
            'geboortedatum' => '0001-01-01',
            'woonplaats' => 'Jura',
            'straat'=> 'BosGrot',
            'huisnummer'=> '6'
        ]);
    }
}
