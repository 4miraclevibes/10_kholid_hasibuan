<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'transaction_id',
        'action_id',
        'dpjp',
        'quantity',
        'total_price',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function action()
    {
        return $this->belongsTo(Action::class);
    }
}
