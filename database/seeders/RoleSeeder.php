<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $roles = [
            [
                'created_at' => $now,
                'updated_at' => $now,
                'name' => 'ADMIN',
            ],
            [
                'created_at' => $now,
                'updated_at' => $now,
                'name' => 'STAFF',
            ],
            [
                'created_at' => $now,
                'updated_at' => $now,
                'name' => 'CUSTOMER',
            ],
        ];

        Role::insert($roles);
    }
}
