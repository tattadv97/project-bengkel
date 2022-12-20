<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'product_code' => $row[0],
            'product_name' => $row[1],
            'base_price' => $row[2],
            'selling_price' => $row[3],
            'unit' => $row[4],
            'stock' => $row[5],
            'category' => $row[6],
            'supplier_id' => Product::firstWhere('company_name', $row[7])->id
        ]);
    }
}
