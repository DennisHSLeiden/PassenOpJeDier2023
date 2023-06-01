<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FotosHuisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fotos_huis')->insert([ // id =1
            'email' => 'dinosaur@gmail.com',
            'path' => 'storage/img/dinosaur@gmail.com/woning fotos',
            'filename'=> 'FuturistischHuis.jpg',
        ]);
        DB::table('fotos_huis')->insert([ // id =2
            'email' => 'dinosaur@gmail.com',
            'path' => 'storage/img/dinosaur@gmail.com/woning fotos',
            'filename'=> 'huis1.jpg',
        ]);
        DB::table('fotos_huis')->insert([ // id =3
            'email' => 'dinosaur@gmail.com',
            'path' => 'storage/img/dinosaur@gmail.com/woning fotos',
            'filename'=> 'huis2.jpg',
        ]);
    }
}
