<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriAssetSeeder extends Seeder
{
    public function run()
    {
        DB::table('tbl_kategori_asset')->insert([
            [
                'kode_kategori_asset' => 'KA001',
                'kategori_asset' => 'Elektronik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kategori_asset' => 'KA002',
                'kategori_asset' => 'Furniture',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kategori_asset' => 'KA003',
                'kategori_asset' => 'Kendaraan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
