<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Tạo các role nếu chưa có
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $staffRole = Role::firstOrCreate(['name' => 'staff']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Các quyền cho từng chức năng
        $permissions = [
            // Staff
            'manage products',
            'manage comments',
            'manage orders',
            'manage banners',
            'manage reviews',
            // Admin
            'manage posts',
            'manage categories',
            'manage coupons',
            'manage users',
            'manage reviews',
            'view statistics',
            'manage imports',
            'manage suppliers',
            'manage roles',
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Gán permission cho role
        $adminRole->syncPermissions($permissions); // admin có tất cả quyền
        $staffRole->syncPermissions([
            'manage products',
            'manage comments',
            'manage orders',
            'manage banners',
            'manage reviews'
        ]); // staff chỉ có quyền quản lý sản phẩm, bình luận, đơn hàng, banner
        $userRole->syncPermissions([]); // user không có quyền đặc biệt
    }
}