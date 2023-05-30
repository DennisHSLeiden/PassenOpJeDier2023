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
            'path' => 'storage/img/huisdier_1_Otso',
            // 'titel' => 'Otso'
            // 'src' => 'public\img\Otso.jpg',
            // 'alt' => 'Een foto van Otso',
            // public/img/huisdier_' . $huisdierMetID->huisdier_id . '_' . $huisdierMetID->naam
        ]);
        DB::table('fotos_huisdier')->insert([ // deze foto krijgt id 2
            'huisdier_id' => '1', //Refereert naar Otso in HuisdierTableSeeder
            'filename' => 'Profile_avatar_placeholder_large.png',
            'path' => 'storage/img/huisdier_1_Otso',
            // 'titel' => 'Otso'
            // 'src' => 'public\img\Otso.jpg',
            // 'alt' => 'Een foto van Otso',
            // public/img/huisdier_' . $huisdierMetID->huisdier_id . '_' . $huisdierMetID->naam
        ]);
        DB::table('fotos_huisdier')->insert([ // deze foto krijgt id 3
            'huisdier_id' => '2', //Refereert naar Cooper in HuisdierTableSeeder
            'filename' => 'Cooper.jpg',
            'path' => 'storage/img/huisdier_2_Cooper',
            // 'titel' => 'Otso'
            // 'src' => 'public\img\Otso.jpg',
            // 'alt' => 'Een foto van Otso',
        ]);
        DB::table('fotos_huisdier')->insert([ // deze foto krijgt id 4
            'huisdier_id' => '2', //Refereert naar Cooper in HuisdierTableSeeder
            'filename' => 'Cooper2.jpg',
            'path' => 'storage/img/huisdier_2_Cooper',
            // 'titel' => 'Otso'
            // 'src' => 'public\img\Otso.jpg',
            // 'alt' => 'Een foto van Otso',
        ]);
        DB::table('fotos_huisdier')->insert([ // deze foto krijgt id 5
            'huisdier_id' => '3', //Refereert naar Jacky in HuisdierTableSeeder
            'filename' => 'Profile_avatar_placeholder_large.png',
            'path' => 'storage/img/huisdier_3_Jacky',
            // 'titel' => 'Otso'
            // 'src' => 'public\img\Otso.jpg',
            // 'alt' => 'Een foto van Otso',
        ]);
        DB::table('fotos_huisdier')->insert([ // deze foto krijgt id 6
            'huisdier_id' => '4', //Refereert naar Monster in HuisdierTableSeeder
            'filename' => 'Profile_avatar_placeholder_large.png',
            'path' => 'storage/img/huisdier_4_Monster',
            // 'titel' => 'Otso'
            // 'src' => 'public\img\Otso.jpg',
            // 'alt' => 'Een foto van Otso',
        ]);
    }
}
