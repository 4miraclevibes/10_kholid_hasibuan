<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'price',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}