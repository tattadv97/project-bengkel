<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function PurchaseDetail(){
        return $this->belongsTo(PurchaseDetail::class, 'invoice');
    }
}
