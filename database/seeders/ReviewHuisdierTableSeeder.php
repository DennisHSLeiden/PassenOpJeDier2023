<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ReviewHuisdierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('review_huisdier')->insert([ //id=1
            'aanvraag_id' => '1',
            'email_van' => 'dinosaur@gmail.com', //Refereert naar Dino in usertable
            'huisdier_id' => '1',  //Refereert naar Otso in HuisdierTableSeeder
            'review' => 'Ik heb nu 2 keer op Otso op mogen passen, en ik zeg je eerlijk, het is een fantastische hond. Heel speels als je het wilt, trekt niet aan de lijn met uitlaten, doet zijn business buiten, makkelijk te voederen, en heel rustig',
            'rating' => 5
        ]);

        DB::table('review_huisdier')->insert([ //id=2
            'aanvraag_id' => '2',
            'email_van' => 'dennisleyting@gmail.com', //Refereert naar Dino in usertable
            'huisdier_id' => '2',  //Refereert naar Otso in HuisdierTableSeeder
        ]);

        DB::table('review_huisdier')->insert([ //id=3
            'aanvraag_id' => '7',
            'email_van' => 'dinosaur@gmail.com', //Refereert naar Dino in usertable
            'huisdier_id' => '2',  //Refereert naar Otso in HuisdierTableSeeder
            'review' => 'hier staat een geweldige review!',
            'rating' => 5
        ]);

        DB::table('review_huisdier')->insert([ //id=4
            'aanvraag_id' => '8',
            'email_van' => 'dinosaur@gmail.com', //Refereert naar Dino in usertable
            'huisdier_id' => '3',  //Refereert naar Otso in HuisdierTableSeeder
            'review' => 'hier staat een geweldige review!',
            'rating' => 4
        ]);
    }
}
