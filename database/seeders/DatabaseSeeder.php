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
        //panggil seeder yg udah dibuat
        $this->call([
            CampSeeder::class,
            CampBenefitTableSeeder::class,
            AdminUserSeeder::class
        ]);
    }
}
