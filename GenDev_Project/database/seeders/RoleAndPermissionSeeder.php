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
        $staffRole = Role::firstOrCreate(['name' => 'nhân viên']);
        $userRole = Role::firstOrCreate(['name' => 'người dùng']);

        // Các quyền cho từng chức năng
        $permissions = [
            // Staff
            'Quản lý sản phẩm',
            'Quản lý bình luận',
            'Quản lý đơn hàng',
            'Quản lý banner',
            // Admin
            'Quản lý hóa đơn nhập hàng',
            'Quản lý danh mục',
            'Quản lý mã giảm giá',
            'Quản lý tài khoản',
            'Quản lý thống kê',
            'Quản lý thuộc tính',
            'Quản lý nhà cung cấp'
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Gán permission cho role
        $adminRole->syncPermissions($permissions); // admin có tất cả quyền
        $staffRole->syncPermissions([
            'Quản lý sản phẩm',
            'Quản lý bình luận',
            'Quản lý đơn hàng',
            'Quản lý banner'
        ]); // staff chỉ có quyền quản lý sản phẩm, bình luận, đơn hàng, banner
        $userRole->syncPermissions([]); // user không có quyền đặc biệt
    }
}
