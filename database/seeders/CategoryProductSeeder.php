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
                'name' => 'Accessories',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Wedding Dresses',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Decorations',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Wedding Suits',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        CategoryProduct::insert($categoryProducts);
    }
}
