<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'avatar' => null,
                'address' => 'Hà Nội',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'phone' => '0123456789',
                'password' => Hash::make('password'),
                'gender' => 'Nam',
                'status' => 1,
                'role' => 0,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Staff',
                'avatar' => null,
                'address' => 'TP.HCM',
                'email' => 'staff@example.com',
                'email_verified_at' => now(),
                'phone' => '0987654321',
                'password' => Hash::make('password'),
                'gender' => 'Nữ',
                'status' => 1,
                'role' => 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User',
                'avatar' => null,
                'address' => 'Đà Nẵng',
                'email' => 'kenhoangkhoaghost@gmail.com',
                'email_verified_at' => now(),
                'phone' => '0911222333',
                'password' => Hash::make('password'),
                'gender' => 'Khác',
                'status' => 1,
                'role' => 2,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Gán role Spatie cho từng user
        $admin = User::where('email', 'admin@example.com')->first();
        if ($admin) $admin->assignRole('admin');
        $staff = User::where('email', 'staff@example.com')->first();
        if ($staff) $staff->assignRole('nhân viên');
        $user = User::where('email', 'kenhoangkhoaghost@gmail.com')->first();
        if ($user) $user->assignRole('người dùng');
    }
}