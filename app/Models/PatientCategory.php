<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientCategory extends Model
{
    protected $fillable = [
        'name',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}