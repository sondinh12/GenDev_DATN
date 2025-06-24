# Hướng dẫn chi tiết sử dụng Spatie Laravel Permission cho dự án

## 1. Giới thiệu

Dự án sử dụng package [spatie/laravel-permission](https://spatie.be/docs/laravel-permission/v5/introduction) để quản lý vai trò (role) và quyền (permission) cho user. Đây là giải pháp động, dễ mở rộng, không phụ thuộc vào trường `role` trong bảng users.

## 2. Các bảng dữ liệu quan trọng

| Bảng                    | Ý nghĩa                                                                          |
| ----------------------- | -------------------------------------------------------------------------------- |
| `roles`                 | Lưu thông tin các vai trò (role) như admin, staff, user...                       |
| `permissions`           | Lưu thông tin các quyền (permission) như edit product, view order...             |
| `model_has_roles`       | Liên kết user (hoặc model khác) với role (user nào có role nào)                  |
| `model_has_permissions` | Liên kết user (hoặc model khác) với permission (user nào có quyền nào trực tiếp) |
| `role_has_permissions`  | Liên kết role với permission (role nào có những quyền nào)                       |

**Lưu ý:** Không thao tác trực tiếp với các bảng này bằng SQL, hãy dùng các hàm của Spatie để đảm bảo đồng bộ cache và logic.

## 3. Các vai trò mặc định trong dự án

- **admin**: Quản trị viên toàn quyền
- **staff**: Nhân viên quản lý sản phẩm, đơn hàng, v.v.
- **user**: Người dùng thông thường

## 4. Quy trình phân quyền chuẩn

1. **Tạo role** (ghi vào bảng `roles`):
   ```php
   use Spatie\Permission\Models\Role;
   Role::create(['name' => 'admin']);
   ```
2. **Tạo permission** (ghi vào bảng `permissions`):
   ```php
   use Spatie\Permission\Models\Permission;
   Permission::create(['name' => 'edit product']);
   ```
3. **Gán permission cho role** (ghi vào bảng `role_has_permissions`):
   ```php
   $role = Role::findByName('admin');
   $role->givePermissionTo('edit product');
   ```
4. **Gán role cho user** (ghi vào bảng `model_has_roles`):
   ```php
   use App\Models\User;
   $user = User::find($id);
   $user->assignRole('admin');
   ```
5. **Gán permission trực tiếp cho user** (ghi vào bảng `model_has_permissions`):
   ```php
   $user->givePermissionTo('edit product');
   ```

## 5. Gán vai trò cho user (thực tế)

- Đã có seeder mẫu (`RoleAndPermissionSeeder`) để tạo role và gán cho user id 0, 1, 2.
- Để gán role cho user khác, dùng code sau (ví dụ trong controller, tinker, hoặc seeder):
  ```php
  use App\Models\User;
  $user = User::find($id);
  $user->assignRole('admin'); // hoặc 'staff', 'user'
  ```

## 6. Kiểm tra vai trò và quyền trong code

- Kiểm tra user có vai trò:
  ```php
  if (auth()->user()->hasRole('admin')) {
      // Chỉ admin mới vào được
  }
  ```
- Kiểm tra nhiều vai trò:
  ```php
  if (auth()->user()->hasAnyRole(['admin', 'staff'])) {
      // Admin hoặc staff đều vào được
  }
  ```
- Kiểm tra quyền (qua role hoặc trực tiếp):
  ```php
  if (auth()->user()->can('edit product')) {
      // ...
  }
  ```

## 7. Sử dụng middleware cho route

- Chặn route chỉ cho phép role nhất định:

  ```php
  Route::middleware(['role:admin'])->group(function () {
      // Route chỉ admin truy cập
  });

  Route::middleware(['role:staff'])->group(function () {
      // Route chỉ staff truy cập
  });

  Route::middleware(['role:admin|staff'])->group(function () {
      // Route cho cả admin và staff
  });
  ```

- Chặn route theo quyền cụ thể:
  ```php
  Route::middleware(['permission:edit product'])->group(function () {
      // Route chỉ user có quyền 'edit product' mới truy cập được
  });
  ```

## 8. Lưu ý thực tiễn

- **Không kiểm tra quyền bằng trường `role` trong bảng users nữa!**
- Luôn dùng các hàm của Spatie: `hasRole`, `hasAnyRole`, `can`, middleware `role`, `permission`.
- Nếu thêm role/permission mới, hãy cập nhật seeder hoặc tạo mới bằng code như trên.
- Khi gán role/permission, Spatie sẽ tự động ghi vào các bảng liên quan và clear cache.
- Nếu gặp lỗi cache, hãy chạy: `php artisan config:clear && php artisan cache:clear`

## 9. Chạy lại seeder nếu cần

- Để tạo lại role và gán cho user mẫu:
  ```bash
  php artisan db:seed --class=Database\Seeders\RoleAndPermissionSeeder
  ```

## 10. Tài liệu tham khảo

- [Tài liệu chính thức Spatie Laravel Permission](https://spatie.be/docs/laravel-permission/v5/introduction)
- [Laravel Middleware](https://laravel.com/docs/12.x/middleware)

---

## 11. Ví dụ thực tế

### Gán role cho user khi đăng ký

```php
// Trong controller sau khi tạo user
$user->assignRole('user');
```

### Gán quyền cho role khi tạo mới

```php
$role = Role::create(['name' => 'manager']);
$role->givePermissionTo(['edit product', 'view order']);
```

### Kiểm tra trong blade

```blade
@role('admin')
    <a href="/admin">Quản trị</a>
@endrole

@can('edit product')
    <button>Sửa sản phẩm</button>
@endcan
```

---

**Nếu có thắc mắc hoặc cần gán role/quyền cho user mới, liên hệ admin hoặc tham khảo tài liệu trên!**
