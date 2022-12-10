<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sparepart;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Supplier::create([
           'company_name' => 'PT Kayaba Indonesia',
           'address' => 'MM2100',
           'contact' => '081282723346'
        ]);

        Supplier::create([
            'company_name' => 'PT Kytaco Japan',
            'address' => 'Pulo Gadung',
            'contact' => '081288399109'
         ]);

         Supplier::create([
            'company_name' => 'PT Denso',
            'address' => 'Cikarang Barat',
            'contact' => '081288399109'
         ]);

        Product::create([
            'product_code' => 'SP001',
            'product_name' => 'Shockbreaker Yamaha B5D',
            'base_price' => 500000,
            'selling_price' => 200000,
            'unit' => 'PCS',
            'stock' => 10,
            'category' => 'SPAREPARTS',
            'supplier_id' => 1
        ]);

        Product::create([
            'product_code' => 'SP002',
            'product_name' => 'Master Rem Kytaco',
            'base_price' => 900000,
            'selling_price' => 1000000,
            'unit' => 'PCS',
            'stock' => 20,
            'category' => 'SPAREPARTS',
            'supplier_id' => 2
        ]);

        Product::create([
            'product_code' => 'SP003',
            'product_name' => 'Spark Plug',
            'base_price' => 40000,
            'selling_price' => 200000,
            'unit' => 'PCS',
            'stock' => 100,
            'category' => 'SPAREPARTS',
            'supplier_id' => 3
        ]);

        Customer::create([
            'nama' => 'UMUM',
            'plat_nomor' => '-',
            'jenis_kendaraan' => '-',
            'kontak' => '-'
        ]);

        Customer::create([
            'nama' => 'Ujkkk',
            'plat_nomor' => 'f15662oo',
            'jenis_kendaraan' => 'hohnda',
            'kontak' => '02883873'
        ]);
    }
}
