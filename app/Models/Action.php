<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = [
        'action',
        'code_icd',
        'price',
    ];

    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
