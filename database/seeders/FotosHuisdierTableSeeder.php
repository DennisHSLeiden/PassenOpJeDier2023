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
            'filename' => 'Otso.jpg',
            'path' => 'storage/img/dennisleyting@gmail.com/huisdieren/Otso',
        ]);
        DB::table('fotos_huisdier')->insert([ // deze foto krijgt id 2
            'huisdier_id' => '2', //Refereert naar Cooper in HuisdierTableSeeder
            'filename' => 'Cooper.jpg',
            'path' => 'storage/img/dinosaur@gmail.com/huisdieren/Cooper',
        ]);
        DB::table('fotos_huisdier')->insert([ // deze foto krijgt id 3
            'huisdier_id' => '2', //Refereert naar Cooper in HuisdierTableSeeder
            'filename' => 'Cooper2.jpg',
            'path' => 'storage/img/dinosaur@gmail.com/huisdieren/Cooper',
        ]);
        DB::table('fotos_huisdier')->insert([ // deze foto krijgt id 4
            'huisdier_id' => '3', //Refereert naar Jacky in HuisdierTableSeeder
            'filename' => 'Jacky.jpg',
            'path' => 'storage/img/dinosaur@gmail.com/huisdieren/Jacky',
        ]);
        DB::table('fotos_huisdier')->insert([ // deze foto krijgt id 5
            'huisdier_id' => '4', //Refereert naar Monster in HuisdierTableSeeder
            'filename' => 'Monster.jpg',
            'path' => 'storage/img/dinosaur@gmail.com/huisdieren/Monster',
        ]);
        DB::table('fotos_huisdier')->insert([ // deze foto krijgt id 5
            'huisdier_id' => '5', //Refereert naar Monster in HuisdierTableSeeder
            'filename' => 'Marvin.jpg',
            'path' => 'storage/img/dennisleyting@gmail.com/huisdieren/Marvin',
        ]);
        DB::table('fotos_huisdier')->insert([ // deze foto krijgt id 5
            'huisdier_id' => '6', //Refereert naar Monster in HuisdierTableSeeder
            'filename' => 'Fizzy.jpg',
            'path' => 'storage/img/dennisleyting@gmail.com/huisdieren/Fizzy',
        ]);
    }
}
