<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function transactionDetail()
    {
        return $this->belongsTo(TransactionDetail::class, 'invoice');
    }

    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class, 'mechanic_id');
    }
}
