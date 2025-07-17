<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Laptop
            [
                'name' => 'Lenovo Ideapad3 15ITL6 i3 1115G4',
                'image' => 'products/lenovo1.jpg',
                'price' => 10090000,
                'sale_price' => 8990000,
                'quantity' => 25,
                'status' => 1,
                'description' => 'Laptop Lenovo Ideapad3 15ITL6 với chip Intel Core i3-1115G4, RAM 8GB DDR4, ổ cứng SSD 256GB, màn hình 15.6 inch Full HD, card đồ họa tích hợp Intel UHD Graphics, hệ điều hành Windows 11 Home. Thiết kế mỏng nhẹ, phù hợp cho công việc văn phòng và học tập.',
                'category_id' => 2
            ],
            [
                'name' => 'Lenovo Ideapad3 15IAU7 i3 1215U',
                'image' => 'products/lenovo2.jpg',
                'price' => 13190000,
                'sale_price' => 11990000,
                'quantity' => 20,
                'status' => 1,
                'description' => 'Laptop Lenovo Ideapad3 15IAU7 với chip Intel Core i3-1215U thế hệ 12, RAM 8GB DDR4, ổ cứng SSD 512GB, màn hình 15.6 inch Full HD IPS, card đồ họa tích hợp Intel UHD Graphics, pin 45Wh, trọng lượng 1.65kg. Hiệu năng ổn định cho công việc và giải trí.',
                'category_id' => 2
            ],
            [
                'name' => 'Lenovo Ideapad1 R7 5700U',
                'image' => 'products/lenovo3.jpg',
                'price' => 13490000,
                'sale_price' => 12490000,
                'quantity' => 15,
                'status' => 1,
                'description' => 'Laptop Lenovo Ideapad1 với chip AMD Ryzen 7 5700U, RAM 16GB DDR4, ổ cứng SSD 512GB, màn hình 14 inch Full HD IPS, card đồ họa tích hợp AMD Radeon Graphics, pin 52.5Wh, trọng lượng 1.4kg. Hiệu năng mạnh mẽ cho đa nhiệm và đồ họa.',
                'category_id' => 2
            ],
            [
                'name' => 'Lenovo Ideapad5 i5 1235U',
                'image' => 'products/lenovo4.jpg',
                'price' => 16990000,
                'sale_price' => 15490000,
                'quantity' => 12,
                'status' => 1,
                'description' => 'Laptop Lenovo Ideapad5 với chip Intel Core i5-1235U thế hệ 12, RAM 16GB DDR4, ổ cứng SSD 512GB, màn hình 14 inch 2.8K OLED, card đồ họa tích hợp Intel Iris Xe Graphics, pin 57Wh, trọng lượng 1.4kg. Thiết kế cao cấp với màn hình OLED sắc nét.',
                'category_id' => 2
            ],
            [
                'name' => 'Asus TUF Gaming F15 i5',
                'image' => 'products/asus1.jpg',
                'price' => 15990000,
                'sale_price' => 14490000,
                'quantity' => 10,
                'status' => 1,
                'description' => 'Laptop Gaming Asus TUF Gaming F15 với chip Intel Core i5-11400H, RAM 16GB DDR4, ổ cứng SSD 512GB, màn hình 15.6 inch Full HD 144Hz, card đồ họa RTX 3050 4GB, pin 48Wh, trọng lượng 2.3kg. Thiết kế gaming với hiệu năng mạnh mẽ.',
                'category_id' => 2
            ],
            [
                'name' => 'Asus Vivobook 16 i5 1335U',
                'image' => 'products/asus2.jpg',
                'price' => 15990000,
                'sale_price' => 14490000,
                'quantity' => 8,
                'status' => 1,
                'description' => 'Laptop Asus Vivobook 16 với chip Intel Core i5-1335U thế hệ 13, RAM 16GB DDR4, ổ cứng SSD 512GB, màn hình 16 inch 2.5K OLED, card đồ họa tích hợp Intel Iris Xe Graphics, pin 50Wh, trọng lượng 1.8kg. Màn hình lớn phù hợp cho thiết kế.',
                'category_id' => 2
            ],
            [
                'name' => 'Asus TUF Gaming A15 R5 7535HS',
                'image' => 'products/asus3.jpg',
                'price' => 21990000,
                'sale_price' => 19990000,
                'quantity' => 6,
                'status' => 1,
                'description' => 'Laptop Gaming Asus TUF Gaming A15 với chip AMD Ryzen 5 7535HS, RAM 16GB DDR5, ổ cứng SSD 512GB, màn hình 15.6 inch Full HD 144Hz, card đồ họa RTX 4050 6GB, pin 90Wh, trọng lượng 2.2kg. Hiệu năng gaming cao cấp.',
                'category_id' => 2
            ],
            [
                'name' => 'Asus Vivobook S 14 Flip i5 13500H',
                'image' => 'products/asus4.jpg',
                'price' => 19290000,
                'sale_price' => 17490000,
                'quantity' => 5,
                'status' => 1,
                'description' => 'Laptop 2-in-1 Asus Vivobook S 14 Flip với chip Intel Core i5-13500H, RAM 16GB DDR4, ổ cứng SSD 512GB, màn hình 14 inch 2.8K OLED cảm ứng, card đồ họa tích hợp Intel Iris Xe Graphics, pin 70Wh, trọng lượng 1.5kg. Thiết kế linh hoạt.',
                'category_id' => 2
            ],
            // Điện thoại
            [
                'name' => 'iPhone 15 Pro Max',
                'image' => 'products/ip15max.jpg',
                'price' => 30990000,
                'sale_price' => 28990000,
                'quantity' => 50,
                'status' => 1,
                'description' => 'iPhone 15 Pro Max với chip A17 Pro, RAM 8GB, bộ nhớ 256GB, màn hình Super Retina XDR 6.7 inch OLED, camera chính 48MP, camera tele 12MP, camera góc siêu rộng 12MP, camera selfie 12MP, pin 4441mAh, sạc nhanh 20W, không dây 15W, kháng nước IP68.',
                'category_id' => 1
            ],
            [
                'name' => 'iPhone 15 Plus',
                'image' => 'products/ip15plus.jpg',
                'price' => 23690000,
                'sale_price' => 21990000,
                'quantity' => 40,
                'status' => 1,
                'description' => 'iPhone 15 Plus với chip A16 Bionic, RAM 6GB, bộ nhớ 128GB, màn hình Super Retina XDR 6.7 inch OLED, camera chính 48MP, camera góc siêu rộng 12MP, camera selfie 12MP, pin 4383mAh, sạc nhanh 20W, không dây 15W, kháng nước IP68.',
                'category_id' => 1
            ],
            [
                'name' => 'iPhone 13 128GB',
                'image' => 'products/ip13.jpg',
                'price' => 15290000,
                'sale_price' => 13990000,
                'quantity' => 30,
                'status' => 1,
                'description' => 'iPhone 13 với chip A15 Bionic, RAM 4GB, bộ nhớ 128GB, màn hình Super Retina XDR 6.1 inch OLED, camera chính 12MP, camera góc siêu rộng 12MP, camera selfie 12MP, pin 3240mAh, sạc nhanh 20W, không dây 15W, kháng nước IP68.',
                'category_id' => 1
            ],
            [
                'name' => 'iPhone 11',
                'image' => 'products/ip11.jpg',
                'price' => 9990000,
                'sale_price' => 8990000,
                'quantity' => 20,
                'status' => 1,
                'description' => 'iPhone 11 với chip A13 Bionic, RAM 4GB, bộ nhớ 64GB, màn hình Liquid Retina HD 6.1 inch LCD, camera chính 12MP, camera góc siêu rộng 12MP, camera selfie 12MP, pin 3110mAh, sạc nhanh 18W, không dây 7.5W, kháng nước IP68.',
                'category_id' => 1
            ],
            [
                'name' => 'iPhone 12',
                'image' => 'products/ip12.jpg',
                'price' => 12090000,
                'sale_price' => 10990000,
                'quantity' => 35,
                'status' => 1,
                'description' => 'iPhone 12 với chip A14 Bionic, RAM 4GB, bộ nhớ 64GB, màn hình Super Retina XDR 6.1 inch OLED, camera chính 12MP, camera góc siêu rộng 12MP, camera selfie 12MP, pin 2815mAh, sạc nhanh 20W, không dây 15W, kháng nước IP68.',
                'category_id' => 1
            ],
            [
                'name' => 'iPhone 14 Pro Max',
                'image' => 'products/ip14 promax.jpg',
                'price' => 27390000,
                'sale_price' => 25490000,
                'quantity' => 15,
                'status' => 1,
                'description' => 'iPhone 14 Pro Max với chip A16 Bionic, RAM 6GB, bộ nhớ 256GB, màn hình Super Retina XDR 6.7 inch OLED, camera chính 48MP, camera tele 12MP, camera góc siêu rộng 12MP, camera selfie 12MP, pin 4323mAh, sạc nhanh 20W, không dây 15W, kháng nước IP68.',
                'category_id' => 1
            ],
            [
                'name' => 'iPhone 14',
                'image' => 'products/ip14.jpg',
                'price' => 17990000,
                'sale_price' => 16490000,
                'quantity' => 25,
                'status' => 1,
                'description' => 'iPhone 14 với chip A15 Bionic, RAM 6GB, bộ nhớ 128GB, màn hình Super Retina XDR 6.1 inch OLED, camera chính 12MP, camera góc siêu rộng 12MP, camera selfie 12MP, pin 3279mAh, sạc nhanh 20W, không dây 15W, kháng nước IP68.',
                'category_id' => 1
            ],
            [
                'name' => 'iPhone 14 Plus',
                'image' => 'products/ip14plus.jpg',
                'price' => 20090000,
                'sale_price' => 18490000,
                'quantity' => 12,
                'status' => 1,
                'description' => 'iPhone 14 Plus với chip A15 Bionic, RAM 6GB, bộ nhớ 128GB, màn hình Super Retina XDR 6.7 inch OLED, camera chính 12MP, camera góc siêu rộng 12MP, camera selfie 12MP, pin 4325mAh, sạc nhanh 20W, không dây 15W, kháng nước IP68.',
                'category_id' => 1
            ],
            [
                'name' => 'OPPO Pad Neo WiFi',
                'image' => 'products/mtb1.jpg',
                'price' => 6490000,
                'sale_price' => 5990000,
                'quantity' => 15,
                'status' => 1,
                'description' => 'Máy tính bảng OPPO Pad Neo WiFi với màn hình 11 inch 2.4K LCD, chip Snapdragon 870, RAM 6GB, bộ nhớ 128GB, camera chính 8MP, camera selfie 8MP, pin 8000mAh, sạc nhanh 33W, trọng lượng 440g. Thiết kế mỏng nhẹ, phù hợp cho giải trí và công việc.',
                'category_id' => 1
            ],
            [
                'name' => 'Samsung Galaxy Tab A9+',
                'image' => 'products/mtb2.jpg',
                'price' => 7490000,
                'sale_price' => 6990000,
                'quantity' => 12,
                'status' => 1,
                'description' => 'Máy tính bảng Samsung Galaxy Tab A9+ với màn hình 11 inch 2.4K LCD, chip Snapdragon 870, RAM 8GB, bộ nhớ 128GB, camera chính 13MP, camera selfie 8MP, pin 8000mAh, sạc nhanh 25W, trọng lượng 480g. Hệ điều hành Android 13 với One UI.',
                'category_id' => 1
            ],
            [
                'name' => 'Honor Pad X9',
                'image' => 'products/mtb3.jpg',
                'price' => 4590000,
                'sale_price' => 4190000,
                'quantity' => 18,
                'status' => 1,
                'description' => 'Máy tính bảng Honor Pad X9 với màn hình 11 inch 2.4K LCD, chip Snapdragon 870, RAM 6GB, bộ nhớ 128GB, camera chính 8MP, camera selfie 8MP, pin 7250mAh, sạc nhanh 22.5W, trọng lượng 465g. Thiết kế hiện đại với hiệu năng ổn định.',
                'category_id' => 1
            ],
            [
                'name' => 'Samsung Galaxy Tab A9',
                'image' => 'products/mtb4.jpg',
                'price' => 3490000,
                'sale_price' => 3190000,
                'quantity' => 20,
                'status' => 1,
                'description' => 'Máy tính bảng Samsung Galaxy Tab A9 với màn hình 8.7 inch HD+ LCD, chip MediaTek Helio G99, RAM 4GB, bộ nhớ 64GB, camera chính 8MP, camera selfie 5MP, pin 5100mAh, sạc nhanh 15W, trọng lượng 331g. Kích thước nhỏ gọn, phù hợp cho trẻ em.',
                'category_id' => 1
            ],
            [
                'name' => 'iPad 9 WiFi',
                'image' => 'products/mtb5.jpg',
                'price' => 7490000,
                'sale_price' => 6990000,
                'quantity' => 15,
                'status' => 1,
                'description' => 'iPad 9 WiFi với màn hình 10.2 inch Retina LCD, chip A13 Bionic, RAM 3GB, bộ nhớ 64GB, camera chính 8MP, camera selfie 12MP, pin 8557mAh, sạc nhanh 20W, trọng lượng 487g. Hệ điều hành iPadOS 15, hỗ trợ Apple Pencil thế hệ 1.',
                'category_id' => 1
            ],
            [
                'name' => 'iPad Air 5 M1 WiFi 64GB',
                'image' => 'products/mtb6.jpg',
                'price' => 14590000,
                'sale_price' => 13490000,
                'quantity' => 8,
                'status' => 1,
                'description' => 'iPad Air 5 với chip M1, RAM 8GB, bộ nhớ 64GB, màn hình 10.9 inch Liquid Retina LCD, camera chính 12MP, camera selfie 12MP, pin 7606mAh, sạc nhanh 20W, trọng lượng 461g. Hiệu năng mạnh mẽ với chip M1, hỗ trợ Apple Pencil thế hệ 2.',
                'category_id' => 1
            ],
            [
                'name' => 'iPad 10 WiFi 64GB',
                'image' => 'products/mtb7.jpg',
                'price' => 11090000,
                'sale_price' => 10290000,
                'quantity' => 10,
                'status' => 1,
                'description' => 'iPad 10 WiFi với chip A14 Bionic, RAM 4GB, bộ nhớ 64GB, màn hình 10.9 inch Liquid Retina LCD, camera chính 12MP, camera selfie 12MP, pin 7606mAh, sạc nhanh 20W, trọng lượng 477g. Thiết kế hiện đại với camera trước ở cạnh ngang.',
                'category_id' => 1
            ],
            [
                'name' => 'Lenovo Tab M10 (Gen3)',
                'image' => 'products/mtb8.jpg',
                'price' => 5290000,
                'sale_price' => 4890000,
                'quantity' => 12,
                'status' => 1,
                'description' => 'Máy tính bảng Lenovo Tab M10 (Gen3) với màn hình 10.3 inch FHD LCD, chip MediaTek Helio P22T, RAM 4GB, bộ nhớ 64GB, camera chính 8MP, camera selfie 5MP, pin 5000mAh, sạc nhanh 10W, trọng lượng 460g. Hệ điều hành Android 11.',
                'category_id' => 1
            ],
            // Phụ kiện
            [
                'name' => 'Wireless Bluetooth Headphone',
                'image' => 'products/5.jpg',
                'price' => 2190000,
                'sale_price' => 1990000,
                'quantity' => 30,
                'status' => 1,
                'description' => 'Tai nghe Bluetooth không dây với công nghệ Bluetooth 5.0, thời gian sử dụng lên đến 20 giờ, sạc nhanh 10 phút cho 2 giờ sử dụng, kháng nước IPX4, micrô tích hợp, điều khiển cảm ứng, thiết kế gập gọn, màu đen thời trang.',
                'category_id' => 3
            ],
            [
                'name' => 'Solo3 Wireless On-Ear Headphones',
                'image' => 'products/6-2.jpg',
                'price' => 3140000,
                'sale_price' => 2970000,
                'quantity' => 25,
                'status' => 1,
                'description' => 'Tai nghe Bluetooth không dây với công nghệ Bluetooth 4.0, thời gian sử dụng lên đến 40 giờ, sạc nhanh 5 phút cho 3 giờ sử dụng, âm thanh Beats signature, micrô tích hợp, điều khiển phím bấm, thiết kế on-ear thoải mái, màu trắng.',
                'category_id' => 3
            ],
            [
                'name' => 'Vifa Portable Wireless Speaker',
                'image' => 'products/11.jpg',
                'price' => 3140000,
                'sale_price' => 2890000,
                'quantity' => 15,
                'status' => 1,
                'description' => 'Loa Bluetooth di động Vifa với công nghệ Bluetooth 4.0, thời gian sử dụng lên đến 20 giờ, công suất 50W, âm thanh 360 độ, kháng nước IPX4, thiết kế sang trọng với vải cao cấp, màu xám, trọng lượng 1.2kg, pin 5200mAh.',
                'category_id' => 3
            ],
            [
                'name' => 'G951s Pink Stereo Gaming Headset',
                'image' => 'products/3.jpg',
                'price' => 3140000,
                'sale_price' => 2890000,
                'quantity' => 20,
                'status' => 1,
                'description' => 'Tai nghe chơi game G951s Pink Stereo với công nghệ Bluetooth 5.0, thời gian sử dụng lên đến 15 giờ, micrô chống ồn, âm thanh 7.1 surround, thiết kế gaming với đèn LED RGB, màu hồng, trọng lượng 350g, tương thích PC/PS4/PS5/Xbox.',
                'category_id' => 3
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}