<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employment;

class EmploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employments = [
            [
                'name' => 'PNS',
            ],
            [
                'name' => 'CPNS',
            ],
            [
                'name' => 'Pegawai Swasta',
            ],
            [
                'name' => 'Wirausaha',
            ],
            [
                'name' => 'Freelancer',
            ],
            [
                'name' => 'Petani',
            ],
            [
                'name' => 'Nelayan',
            ],
            [
                'name' => 'Buruh',
            ],
            [
                'name' => 'Pelajar/Mahasiswa',
            ],
            [
                'name' => 'Pensiunan',
            ],
            [
                'name' => 'Ibu Rumah Tangga',
            ],
            [
                'name' => 'Tidak Bekerja',
            ],
        ];

        foreach ($employments as $employment) {
            Employment::create($employment);
        }
    }
}
