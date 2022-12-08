<?php

namespace Database\Seeders;

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

        Sparepart::create([
            'spare_parts_id' => 'SP001',
            'spare_parts_name' => 'Shockbreaker Yamaha B5D',
            'base_price' => 'Rp. 500.000',
            'selling_price' => '1kg',
            'qty' => '2',
            'stock' => '10',
            'supplier_id' => 1
        ]);

        Sparepart::create([
            'spare_parts_id' => 'SP002',
            'spare_parts_name' => 'Master Rem Kytaco',
            'base_price' => 'Rp. 900.000',
            'selling_price' => '900gr',
            'qty' => '1',
            'stock' => '20',
            'supplier_id' => 2
        ]);

        Sparepart::create([
            'spare_parts_id' => 'SP003',
            'spare_parts_name' => 'Spark Plug',
            'base_price' => 'Rp. 40.000',
            'selling_price' => '250gr',
            'qty' => '2',
            'stock' => '100',
            'supplier_id' => 3
        ]);
    }
}
