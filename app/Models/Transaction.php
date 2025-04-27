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

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}