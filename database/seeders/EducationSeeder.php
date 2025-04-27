<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Education;
class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educations = [
            [
                'name' => 'SD',
            ],
            [
                'name' => 'SMP',
            ],
            [
                'name' => 'SMA',
            ],
            [
                'name' => 'DIPLOMA',
            ],
            [
                'name' => 'SARJANA',
            ],
            [
                'name' => 'DOKTOR',
            ],
        ];

        foreach ($educations as $education) {
            Education::create($education);
        }
    }
}
