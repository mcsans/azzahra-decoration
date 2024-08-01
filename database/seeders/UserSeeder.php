<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $role = Role::where('name', 'ADMIN')->first();

        $users = [
            [
                'created_at' => $now,
                'updated_at' => $now,
                'role_id' => $role->id,
                'name' => 'Administrator',
                'email' => 'admin@mail.com',
                'email_verified_at' => $now,
                'password' => Hash::make('Password123!'),
            ],
        ];

        User::insert($users);
    }
}
