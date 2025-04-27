<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'registration_id',
        'employee_id',
        'date',
        'checkin_date',
        'checkout_date',
        'total_price',
        'status',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class);
    }

}