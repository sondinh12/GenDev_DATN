<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductVariantSeeder extends Seeder
{
    public function run(): void
    {
        $productIds = [
            'iPhone 15 Pro Max' => Product::where('name', 'iPhone 15 Pro Max')->value('id'),
            'Samsung Galaxy S24 Ultra' => Product::where('name', 'Samsung Galaxy S24 Ultra')->value('id'),
            'Asus Vivobook 16' => Product::where('name', 'Asus Vivobook 16')->value('id'),
            'Dell XPS 13' => Product::where('name', 'Dell XPS 13')->value('id'),
            'Tai nghe Lenovo' => Product::where('name', 'Tai Nghe Lenovo')->value('id'),
            'Sạc dự phòng Baseus' => Product::where('name', 'Sạc dự phòng Baseus')->value('id'),
            'iPad Air (M3)' => Product::where('name', 'iPad Air (M3)')->value('id'),
            'Samsung Galaxy Tab S9' => Product::where('name', 'Samsung Galaxy Tab S9')->value('id'),
            'Tivi Sony 4K' => Product::where('name', 'Tivi Sony 4K')->value('id'),
            'Tivi LG 55 inch' => Product::where('name', 'Tivi LG 55 inch')->value('id'),
            'Loa Bluetooth JBL' => Product::where('name', 'Loa Bluetooth JBL')->value('id'),
            'Loa Bluetooth Cyboris' => Product::where('name', 'Loa Bluetooth Cyboris')->value('id'),
            'Máy ảnh Lomo' => Product::where('name', 'Máy ảnh Lomo')->value('id'),
            'Instax Mini 12' => Product::where('name', 'Instax Mini 12')->value('id'),
            'HUAWEI watch fit 3' => Product::where('name', 'HUAWEI watch fit 3')->value('id'),
            'Đồng hồ Xiaomi Smart' => Product::where('name', 'Đồng hồ Xiaomi Smart')->value('id'),
            'TP-Link Router Wi-Fi 4G' => Product::where('name', 'TP-Link Router Wi-Fi 4G')->value('id'),
            'Switch TP-Link 8-Port' => Product::where('name', 'Switch TP-Link 8-Port')->value('id'),
            'Máy in laser CANON' => Product::where('name', 'Máy in laser CANON')->value('id'),
            'Máy in Epson L3250' => Product::where('name', 'Máy in Epson L3250')->value('id'),
        ];

        DB::table('product_variants')->insert([
            // iPhone 15 Pro Max
            ['product_id' => $productIds['iPhone 15 Pro Max'], 'price' => 30990000, 'sale_price' => 28990000, 'quantity' => 120, 'status' => 1],
            ['product_id' => $productIds['iPhone 15 Pro Max'], 'price' => 31990000, 'sale_price' => 29990000, 'quantity' => 85, 'status' => 1],
            ['product_id' => $productIds['iPhone 15 Pro Max'], 'price' => 31490000, 'sale_price' => 29490000, 'quantity' => 23, 'status' => 1],
            ['product_id' => $productIds['iPhone 15 Pro Max'], 'price' => 32490000, 'sale_price' => 30490000, 'quantity' => 33, 'status' => 1],

            // Samsung Galaxy S24 Ultra
            ['product_id' => $productIds['Samsung Galaxy S24 Ultra'], 'price' => 27990000, 'sale_price' => 25990000, 'quantity' => 98, 'status' => 1],
            ['product_id' => $productIds['Samsung Galaxy S24 Ultra'], 'price' => 28990000, 'sale_price' => 26990000, 'quantity' => 115, 'status' => 1],
            ['product_id' => $productIds['Samsung Galaxy S24 Ultra'], 'price' => 28490000, 'sale_price' => 26490000, 'quantity' => 63, 'status' => 1],
            ['product_id' => $productIds['Samsung Galaxy S24 Ultra'], 'price' => 29490000, 'sale_price' => 27490000, 'quantity' => 112, 'status' => 1],

            // Asus Vivobook 16
            ['product_id' => $productIds['Asus Vivobook 16'], 'price' => 15990000, 'sale_price' => 14490000, 'quantity' => 14, 'status' => 1],
            ['product_id' => $productIds['Asus Vivobook 16'], 'price' => 16990000, 'sale_price' => 15490000, 'quantity' => 43, 'status' => 1],
            ['product_id' => $productIds['Asus Vivobook 16'], 'price' => 16490000, 'sale_price' => 14990000, 'quantity' => 72, 'status' => 1],
            ['product_id' => $productIds['Asus Vivobook 16'], 'price' => 17490000, 'sale_price' => 15990000, 'quantity' => 11, 'status' => 1],

            // Dell XPS 13
            ['product_id' => $productIds['Dell XPS 13'], 'price' => 24990000, 'sale_price' => 22990000, 'quantity' => 14, 'status' => 1],
            ['product_id' => $productIds['Dell XPS 13'], 'price' => 25990000, 'sale_price' => 23990000, 'quantity' => 22, 'status' => 1],
            ['product_id' => $productIds['Dell XPS 13'], 'price' => 25490000, 'sale_price' => 23490000, 'quantity' => 31, 'status' => 1],
            ['product_id' => $productIds['Dell XPS 13'], 'price' => 26490000, 'sale_price' => 24490000, 'quantity' => 33, 'status' => 1],

            // Tai nghe Lenovo
            ['product_id' => $productIds['Tai nghe Lenovo'], 'price' => 790000, 'sale_price' => 670000, 'quantity' => 61, 'status' => 1],
            ['product_id' => $productIds['Tai nghe Lenovo'], 'price' => 890000, 'sale_price' => 770000, 'quantity' => 97, 'status' => 1],
            ['product_id' => $productIds['Tai nghe Lenovo'], 'price' => 840000, 'sale_price' => 720000, 'quantity' => 17, 'status' => 1],
            ['product_id' => $productIds['Tai nghe Lenovo'], 'price' => 940000, 'sale_price' => 820000, 'quantity' => 35, 'status' => 1],

            // Sạc dự phòng Baseus
            ['product_id' => $productIds['Sạc dự phòng Baseus'], 'price' => 1200000, 'sale_price' => 990000, 'quantity' => 42, 'status' => 1],
            ['product_id' => $productIds['Sạc dự phòng Baseus'], 'price' => 1300000, 'sale_price' => 1090000, 'quantity' => 88, 'status' => 1],
            ['product_id' => $productIds['Sạc dự phòng Baseus'], 'price' => 1250000, 'sale_price' => 1040000, 'quantity' => 39, 'status' => 1],
            ['product_id' => $productIds['Sạc dự phòng Baseus'], 'price' => 1350000, 'sale_price' => 1140000, 'quantity' => 72, 'status' => 1],

            // iPad Air (M3)
            ['product_id' => $productIds['iPad Air (M3)'], 'price' => 14590000, 'sale_price' => 13490000, 'quantity' => 62, 'status' => 1],
            ['product_id' => $productIds['iPad Air (M3)'], 'price' => 15590000, 'sale_price' => 14490000, 'quantity' => 23, 'status' => 1],
            ['product_id' => $productIds['iPad Air (M3)'], 'price' => 15090000, 'sale_price' => 13990000, 'quantity' => 32, 'status' => 1],
            ['product_id' => $productIds['iPad Air (M3)'], 'price' => 16090000, 'sale_price' => 14990000, 'quantity' => 75, 'status' => 1],

            // Samsung Galaxy Tab S9
            ['product_id' => $productIds['Samsung Galaxy Tab S9'], 'price' => 20000000, 'sale_price' => 18000000, 'quantity' => 125, 'status' => 1],
            ['product_id' => $productIds['Samsung Galaxy Tab S9'], 'price' => 21000000, 'sale_price' => 19000000, 'quantity' => 73, 'status' => 1],
            ['product_id' => $productIds['Samsung Galaxy Tab S9'], 'price' => 20500000, 'sale_price' => 18500000, 'quantity' => 91, 'status' => 1],
            ['product_id' => $productIds['Samsung Galaxy Tab S9'], 'price' => 21500000, 'sale_price' => 19500000, 'quantity' => 81, 'status' => 1],

            // Tivi Sony 4K
            ['product_id' => $productIds['Tivi Sony 4K'], 'price' => 17000000, 'sale_price' => 15000000, 'quantity' => 31, 'status' => 1],
            ['product_id' => $productIds['Tivi Sony 4K'], 'price' => 18000000, 'sale_price' => 16000000, 'quantity' => 22, 'status' => 1],
            ['product_id' => $productIds['Tivi Sony 4K'], 'price' => 17500000, 'sale_price' => 15500000, 'quantity' => 31, 'status' => 1],
            ['product_id' => $productIds['Tivi Sony 4K'], 'price' => 18500000, 'sale_price' => 16500000, 'quantity' => 91, 'status' => 1],

            // Tivi LG 55 inch
            ['product_id' => $productIds['Tivi LG 55 inch'], 'price' => 20000000, 'sale_price' => 18000000, 'quantity' => 42, 'status' => 1],
            ['product_id' => $productIds['Tivi LG 55 inch'], 'price' => 21000000, 'sale_price' => 19000000, 'quantity' => 52, 'status' => 1],
            ['product_id' => $productIds['Tivi LG 55 inch'], 'price' => 20500000, 'sale_price' => 18500000, 'quantity' => 41, 'status' => 1],
            ['product_id' => $productIds['Tivi LG 55 inch'], 'price' => 21500000, 'sale_price' => 19500000, 'quantity' => 124, 'status' => 1],

            // Loa Bluetooth JBL
            ['product_id' => $productIds['Loa Bluetooth JBL'], 'price' => 2500000, 'sale_price' => 2200000, 'quantity' => 28, 'status' => 1],
            ['product_id' => $productIds['Loa Bluetooth JBL'], 'price' => 2600000, 'sale_price' => 2300000, 'quantity' => 62, 'status' => 1],
            ['product_id' => $productIds['Loa Bluetooth JBL'], 'price' => 2550000, 'sale_price' => 2250000, 'quantity' => 94, 'status' => 1],
            ['product_id' => $productIds['Loa Bluetooth JBL'], 'price' => 2650000, 'sale_price' => 2350000, 'quantity' => 47, 'status' => 1],

            // Loa Bluetooth Cyboris
            ['product_id' => $productIds['Loa Bluetooth Cyboris'], 'price' => 2770000, 'sale_price' => 2600000, 'quantity' => 38, 'status' => 1],
            ['product_id' => $productIds['Loa Bluetooth Cyboris'], 'price' => 2870000, 'sale_price' => 2499000, 'quantity' => 26, 'status' => 1],
            ['product_id' => $productIds['Loa Bluetooth Cyboris'], 'price' => 2820000, 'sale_price' => 2650000, 'quantity' => 24, 'status' => 1],
            ['product_id' => $productIds['Loa Bluetooth Cyboris'], 'price' => 2920000, 'sale_price' => 2759000, 'quantity' => 72, 'status' => 1],

            // Máy ảnh Lomo
            ['product_id' => $productIds['Máy ảnh Lomo'], 'price' => 1200000, 'sale_price' => 900000, 'quantity' => 48, 'status' => 1],
            ['product_id' => $productIds['Máy ảnh Lomo'], 'price' => 1300000, 'sale_price' => 1000000, 'quantity' => 16, 'status' => 1],
            ['product_id' => $productIds['Máy ảnh Lomo'], 'price' => 1250000, 'sale_price' => 950000, 'quantity' => 64, 'status' => 1],
            ['product_id' => $productIds['Máy ảnh Lomo'], 'price' => 1350000, 'sale_price' => 1050000, 'quantity' => 92, 'status' => 1],

            // Instax Mini 12
            ['product_id' => $productIds['Instax Mini 12'], 'price' => 3200000, 'sale_price' => 2850000, 'quantity' => 128, 'status' => 1],
            ['product_id' => $productIds['Instax Mini 12'], 'price' => 3300000, 'sale_price' => 2950000, 'quantity' => 56, 'status' => 1],
            ['product_id' => $productIds['Instax Mini 12'], 'price' => 3250000, 'sale_price' => 2900000, 'quantity' => 54, 'status' => 1],
            ['product_id' => $productIds['Instax Mini 12'], 'price' => 3350000, 'sale_price' => 3000000, 'quantity' => 92, 'status' => 1],

            // HUAWEI watch fit 3
            ['product_id' => $productIds['HUAWEI watch fit 3'], 'price' => 2880000, 'sale_price' => 2350000, 'quantity' => 83, 'status' => 1],
            ['product_id' => $productIds['HUAWEI watch fit 3'], 'price' => 2980000, 'sale_price' => 2450000, 'quantity' => 36, 'status' => 1],
            ['product_id' => $productIds['HUAWEI watch fit 3'], 'price' => 2930000, 'sale_price' => 2400000, 'quantity' => 74, 'status' => 1],
            ['product_id' => $productIds['HUAWEI watch fit 3'], 'price' => 3030000, 'sale_price' => 2500000, 'quantity' => 52, 'status' => 1],

            // Đồng hồ Xiaomi Smart
            ['product_id' => $productIds['Đồng hồ Xiaomi Smart'], 'price' => 2500000, 'sale_price' => 2200000, 'quantity' => 84, 'status' => 1],
            ['product_id' => $productIds['Đồng hồ Xiaomi Smart'], 'price' => 2600000, 'sale_price' => 2300000, 'quantity' => 66, 'status' => 1],
            ['product_id' => $productIds['Đồng hồ Xiaomi Smart'], 'price' => 2550000, 'sale_price' => 2250000, 'quantity' => 54, 'status' => 1],
            ['product_id' => $productIds['Đồng hồ Xiaomi Smart'], 'price' => 2650000, 'sale_price' => 2350000, 'quantity' => 62, 'status' => 1],

            // TP-Link Router Wi-Fi 4G
            ['product_id' => $productIds['TP-Link Router Wi-Fi 4G'], 'price' => 900000, 'sale_price' => 800000, 'quantity' => 58, 'status' => 1],
            ['product_id' => $productIds['TP-Link Router Wi-Fi 4G'], 'price' => 950000, 'sale_price' => 850000, 'quantity' => 55, 'status' => 1],
            ['product_id' => $productIds['TP-Link Router Wi-Fi 4G'], 'price' => 920000, 'sale_price' => 820000, 'quantity' => 63, 'status' => 1],
            ['product_id' => $productIds['TP-Link Router Wi-Fi 4G'], 'price' => 970000, 'sale_price' => 870000, 'quantity' => 32, 'status' => 1],

            // Switch TP-Link 8-Port
            ['product_id' => $productIds['Switch TP-Link 8-Port'], 'price' => 700000, 'sale_price' => 650000, 'quantity' => 76, 'status' => 1],
            ['product_id' => $productIds['Switch TP-Link 8-Port'], 'price' => 750000, 'sale_price' => 700000, 'quantity' => 54, 'status' => 1],
            ['product_id' => $productIds['Switch TP-Link 8-Port'], 'price' => 720000, 'sale_price' => 670000, 'quantity' => 31, 'status' => 1],
            ['product_id' => $productIds['Switch TP-Link 8-Port'], 'price' => 770000, 'sale_price' => 720000, 'quantity' => 81, 'status' => 1],

            // Máy in laser CANON
            ['product_id' => $productIds['Máy in laser CANON'], 'price' => 3200000, 'sale_price' => 2990000, 'quantity' => 73, 'status' => 1],
            ['product_id' => $productIds['Máy in laser CANON'], 'price' => 3300000, 'sale_price' => 3090000, 'quantity' => 52, 'status' => 1],
            ['product_id' => $productIds['Máy in laser CANON'], 'price' => 3250000, 'sale_price' => 3040000, 'quantity' => 41, 'status' => 1],
            ['product_id' => $productIds['Máy in laser CANON'], 'price' => 3350000, 'sale_price' => 3140000, 'quantity' => 86, 'status' => 1],

            // Máy in Epson L3250
            ['product_id' => $productIds['Máy in Epson L3250'], 'price' => 2500000, 'sale_price' => 2200000, 'quantity' => 72, 'status' => 1],
            ['product_id' => $productIds['Máy in Epson L3250'], 'price' => 2600000, 'sale_price' => 2300000, 'quantity' => 62, 'status' => 1],
            ['product_id' => $productIds['Máy in Epson L3250'], 'price' => 2550000, 'sale_price' => 2250000, 'quantity' => 61, 'status' => 1],
            ['product_id' => $productIds['Máy in Epson L3250'], 'price' => 2650000, 'sale_price' => 2350000, 'quantity' => 91, 'status' => 1],
        ]);
    }
}