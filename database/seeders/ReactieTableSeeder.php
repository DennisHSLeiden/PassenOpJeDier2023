<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ReactieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reactie')->insert([ //id=1
            'email' => 'dinosaur@gmail.com', //Refereert naar Dino in UserTableSeeder
            'aanvraag_id' => '3', //Refereert naar Otso's aanvraag in AanvraagTableSeeder
            'comment' => 'Hoi! ik ben geintereseerd in het hondzitten van Otso, laat maar weten, groetjes',
        ]);
        DB::table('reactie')->insert([ //id=2
            'email' => 'dinosaur@gmail.com', //Refereert naar Dino in UserTableSeeder
            'aanvraag_id' => '3', //Refereert naar Otso's aanvraag in AanvraagTableSeeder
            'comment' => 'comment2',
        ]);
        DB::table('reactie')->insert([ //id=3
            'email' => 'dinosaur@gmail.com', //Refereert naar Dino in UserTableSeeder
            'aanvraag_id' => '3', //Refereert naar Otso's aanvraag in AanvraagTableSeeder
            'comment' => 'comment3',
        ]);
        DB::table('reactie')->insert([ //id=3
            'email' => 'dennisleyting@gmail.com', //Refereert naar Dennis in UserTableSeeder
            'aanvraag_id' => '5', //Refereert naar monster's aanvraag in AanvraagTableSeeder
            'comment' => 'comment1',
        ]);
        DB::table('reactie')->insert([ //id=3
            'email' => 'dennisleyting@gmail.com', //Refereert naar Dennis in UserTableSeeder
            'aanvraag_id' => '6', //Refereert naar Cooper's aanvraag in AanvraagTableSeeder
            'comment' => 'comment1',
        ]);
    }
}
