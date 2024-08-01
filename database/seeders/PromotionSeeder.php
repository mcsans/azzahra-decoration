<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $promotions = [
            [
                'code' => 'AZZAHRA2024',
                'name' => '30% off on all products',
                'type' => 'PERCENT',
                'discount' => 30,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => 'DECORATION2024',
                'name' => 'First Launh Azzahra Decoration Discount',
                'type' => 'FIXED',
                'discount' => 30000,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Promotion::insert($promotions);
    }
}
