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

        // Tạo các permission mẫu
        $permissions = [
            'edit product',
            'delete product',
            'view order',
            'manage users',
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Gán permission cho role
        $adminRole->syncPermissions($permissions); // admin có tất cả quyền
        $staffRole->syncPermissions(['edit product', 'view order']); // staff có quyền chỉnh sửa sản phẩm và xem đơn hàng
        $userRole->syncPermissions([]); // user không có quyền đặc biệt
    }
}
