<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductQuestion;
use Illuminate\Support\Carbon;

class ProductQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            ['iPhone 15 Pro Max có hỗ trợ 5G không?', 'approved'], // product_id 1
            ['Samsung Galaxy S24 Ultra có camera 200MP không?', 'rejected'], // product_id 2
            ['Asus Vivobook 16 có chip i7 không?', 'approved'], // product_id 3
            ['Dell XPS 13 có màn hình cảm ứng không?', 'rejected'], // product_id 4
            ['Tai Nghe Lenovo TH60 ANC có chống ồn tốt không?', 'approved'], // product_id 5
            ['Sạc dự phòng Baseus có dung lượng 20000mAh không?', 'rejected'], // product_id 6
            ['iPad Air (M3) có hỗ trợ Apple Pencil không?', 'approved'], // product_id 7
            ['Samsung Galaxy Tab S9 có RAM 12GB không?', 'rejected'], // product_id 8
            ['Tivi Sony 4K có hỗ trợ HDR không?', 'approved'], // product_id 9
            ['Tivi LG 55 inch có cổng HDMI 2.1 không?', 'rejected'], // product_id 10
            ['Loa Bluetooth JBL có chống nước IPX7 không?', 'approved'], // product_id 11
            ['Loa Bluetooth Cyboris X10 có pin 10000mAh không?', 'rejected'], // product_id 12
            ['Máy ảnh Lomo chống nước có bền không?', 'approved'], // product_id 13
            ['Instax Mini 12 có phim đi kèm không?', 'rejected'], // product_id 14
            ['HUAWEI watch fit 3 có đo nhịp tim chính xác không?', 'approved'], // product_id 15
            ['Đồng hồ Xiaomi Smart Band 10 có chống nước không?', 'rejected'], // product_id 16
            ['TP-Link Router Wi-Fi 4G có tốc độ 300Mbps không?', 'approved'], // product_id 17
            ['Switch TP-Link 8-Port có cổng Gigabit không?', 'rejected'], // product_id 18
            ['Máy in laser CANON LBP 6030 có in hai mặt không?', 'approved'], // product_id 19
            ['Máy in Epson L3250 có bản in màu không?', 'rejected'], // product_id 20
            ['iPhone 15 Pro Max có sạc không dây không?', 'approved'], // product_id 1 (thêm câu hỏi cho sản phẩm đầu tiên)
        ];

        $data = [];
        $startDate = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30); // 25/07/2025
        $endDate = Carbon::now('Asia/Ho_Chi_Minh'); // 12:04 AM +07, 25/08/2025

        for ($i = 0; $i < count($questions); $i++) {
            $randomDate = Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp), 'Asia/Ho_Chi_Minh');
            $data[] = [
                'user_id' => rand(1, 9),
                'product_id' => ($i % 16) + 1, // Lặp lại product_id từ 1 đến 21
                'question' => $questions[$i][0],
                'status' => $questions[$i][1],
                'created_at' => $randomDate,
                'updated_at' => $randomDate,
            ];
        }

        ProductQuestion::insert($data);
    }
}
