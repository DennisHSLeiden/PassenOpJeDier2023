<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ReviewOppasserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('review_oppasser')->insert([ //id=1
            'aanvraag_id' => '1',
            'email_van' => 'dennisleyting@gmail.com',
            'email_voor' => 'dinosaur@gmail.com',
            'review' => 'Dino heeft nu al een paar keer op Otso gepast, en ben er zeer tevreden mee. De communicatie is goed, en Otso is altijd blij hem weer te zien',
            'rating' => 4
        ]);

        DB::table('review_oppasser')->insert([ //id=1
            'aanvraag_id' => '2',
            'email_van' => 'dinosaur@gmail.com',
            'email_voor' => 'dennisleyting@gmail.com',
            'review' => 'Hier staat een geweldige Review, en je bent er echt van overtuigd dat Dennis een goede oppasser is!',
            'rating' => 4
        ]);
    }
}
