<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $categoryProducts = [
            [
                'name' => 'Aksesoris',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Gaun Pernikahan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Dekorasi',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Jas Pernikahan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        CategoryProduct::insert($categoryProducts);
    }
}
