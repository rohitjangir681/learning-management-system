<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'password' => Hash::make(12345678),
                'role' => 'student'
            ],
            [
                'name' => 'instructor',
                'email' => 'instructor@gmail.com',
                'password' => Hash::make(12345678),
                'role' => 'instructor'
            ]
        ];

        User::insert($users);
    }
}
