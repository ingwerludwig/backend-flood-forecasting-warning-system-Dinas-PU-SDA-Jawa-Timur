<?php

namespace Database\Seeders;

use App\Models\UsersRole;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Create ADMIN and USER Role For Control Access
         */
        $roles = [
            [
                'role_name' => 'ADMIN',
                'created_at' => Carbon::now()
            ],
            [
                'role_name' => 'USER',
                'created_at' => Carbon::now()
            ]
        ];

        UsersRole::insert($roles);
    }
}

