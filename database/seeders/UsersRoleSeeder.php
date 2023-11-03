<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UsersRole;

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
