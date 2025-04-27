<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'patient_id',
        'patient_category_id',
        'employee_id',
        'room_id',
        'insurance_number',
        'date',
        'status',
        'is_inpatient',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function patientCategory()
    {
        return $this->belongsTo(PatientCategory::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
