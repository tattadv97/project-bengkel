<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;

    public function supplier(){
        $this->belongsTo(Supplier::class, 'id_supplier');
    }
}
