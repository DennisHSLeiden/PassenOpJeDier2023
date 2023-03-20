<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('review')->insert([ //id=1
            'email' => 'dinosaur@gmail.com', //Refereert naar Dino in usertable
            'huisdier_id' => '1',  //Refereert naar Otso in HuisdierTableSeeder
            'review' => 'Ik heb nu 2 keer op Otso op mogen passen, en ik zeg je eerlijk, het is een fantastische hond. Heel speels als je het wilt, trekt niet aan de lijn met uitlaten, doet zijn business buiten, makkelijk te voederen, en heel rustig'
        ]);
    }
}
