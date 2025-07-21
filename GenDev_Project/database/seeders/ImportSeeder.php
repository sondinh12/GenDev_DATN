<?php

namespace Database\Seeders;

use App\Models\Import;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = Supplier::all();

        foreach ($suppliers as $supplier) {
            Import::create([
                'supplier_id' => $supplier->id,
                'import_date' => now()->subDays(rand(1, 15)),
                'total_cost' => 0, // sẽ cập nhật sau
                'note' => 'Phiếu nhập test',
                'status'=> 0
            ]);
        }
    }
}
