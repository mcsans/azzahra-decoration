<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravolt\Indonesia\Seeds\CitiesSeeder;
use Laravolt\Indonesia\Seeds\ProvincesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Local
        $this->call([
            CategoryProductSeeder::class,
            ProductSeeder::class,
            PromotionSeeder::class,
        ]);

        // Production
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);

        // Laravolt Indonesia
        $this->call([
            // ProvincesSeeder::class,
            // CitiesSeeder::class,
            // DistrictsSeeder::class,
            // VillagesSeeder::class,
        ]);
    }
}
