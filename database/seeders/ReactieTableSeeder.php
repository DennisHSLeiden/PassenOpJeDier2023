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
            'aanvraag_id' => '1', //Refereert naar Otso's aanvraag in AanvraagTableSeeder
            'comment' => 'Hoi! ik ben geintereseerd in het hondzitten van Otso, laat maar weten, groetjes',
        ]);
    }
}
