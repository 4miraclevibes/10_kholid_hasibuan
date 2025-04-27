<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PatientCategory;
class PatientCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patientCategories = [
            [
                'name' => 'Umum',
            ],
            [
                'name' => 'BPJS Kesehatan',
            ],
            [
                'name' => 'BPJS Ketenagakerjaan',
            ],
            [
                'name' => 'PLN',
            ],
            [
                'name' => 'BRI',
            ],
            [
                'name' => 'Mandiri',
            ],
            [
                'name' => 'Asuransi Lainnya',
            ],
        ];

        foreach ($patientCategories as $patientCategory) {
            PatientCategory::create($patientCategory);
        }
        
    }
}
