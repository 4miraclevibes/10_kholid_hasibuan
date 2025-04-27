<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Action; // Pastikan sudah pakai model Action-mu

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actions = [
            [
                'action' => 'Medical Consultation',
                'code_icd' => 'Z71.1',
                'price' => 150000,
            ],
            [
                'action' => 'Basic Blood Test',
                'code_icd' => 'R79.9',
                'price' => 200000,
            ],
            [
                'action' => 'Chest X-Ray',
                'code_icd' => 'R91.8',
                'price' => 350000,
            ],
            [
                'action' => 'Minor Surgery',
                'code_icd' => 'Z48.0',
                'price' => 1200000,
            ],
            [
                'action' => 'Physiotherapy Session',
                'code_icd' => 'Z51.8',
                'price' => 250000,
            ],
        ];

        foreach ($actions as $action) {
            Action::create($action);
        }
    }
}
