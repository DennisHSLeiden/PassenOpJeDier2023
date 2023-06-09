<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UsersTableSeeder::class,
            ExtraUserInformationTableSeeder::class,
            SoortenTableSeeder::class,
            HuisdierTableSeeder::class,
            FotosHuisTableSeeder::class,
            FotosHuisdierTableSeeder::class,
            AanvraagTableSeeder::class,
            ReactieTableSeeder::class,
            ReviewHuisdierTableSeeder::class,
            ReviewOppasserTableSeeder::class

        ]);
    }
}
