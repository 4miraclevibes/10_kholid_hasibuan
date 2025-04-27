<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class Patient extends Model
{
    protected $fillable = [
        'province_id',
        'city_id',
        'district_id',
        'village_id',
        'education_id',
        'employment_id',
        'name',
        'address',
        'birth_place',
        'birth_date',
        'gender',
        'phone',
        'marital_status',
        'father_name',
        'mother_name',
        'guardian_name',
        'identity_number',
        'allergy',
        'is_employee',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function employment()
    {
        return $this->belongsTo(Employment::class);
    }
    
}
