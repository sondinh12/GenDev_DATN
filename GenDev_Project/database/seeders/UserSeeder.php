<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Tạo 2 admin
        for ($i = 1; $i <= 2; $i++) {
            $admin = User::firstOrCreate(
                ['email' => "admin{$i}@example.com"],
                [
                    'name' => "Admin {$i}",
                    'password' => Hash::make('password'),
                    'status' => 1,
                    'gender' => 'Nam',
                    'phone' => '0123456789',
                ]
            );
            $admin->assignRole('admin');
        }

        // Tạo 3 staff
        for ($i = 1; $i <= 3; $i++) {
            $staff = User::firstOrCreate(
                ['email' => "staff{$i}@example.com"],
                [
                    'name' => "Staff {$i}",
                    'password' => Hash::make('password'),
                    'status' => 1,
                    'gender' => 'Nam',
                    'phone' => '0123456789',
                ]
            );
            $staff->assignRole('staff');
        }

        // Tạo 5 user
        for ($i = 1; $i <= 5; $i++) {
            $user = User::firstOrCreate(
                ['email' => "user{$i}@example.com"],
                [
                    'name' => "User {$i}",
                    'password' => Hash::make('password'),
                    'status' => 1,
                    'gender' => 'Nam',
                    'phone' => '0123456789',
                ]
            );
            $user->assignRole('user');
        }
    }
}
