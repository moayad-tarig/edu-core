<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'student',
                'email' => 'student@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 'student',
                'approve_status' => 'approved',
            ],
            [
                'name' => 'instructor',
                'email' => 'instrctur@gmail.com',
                'password' => bcrypt('123456789'),
                'approve_status' => 'approved',
                'role' => 'instructor',

            ],

        ];
        User::insert($users);
    }
}
