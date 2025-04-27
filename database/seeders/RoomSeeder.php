<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;
class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                'name' => 'Rajal',
                'price' => 0,
            ],
            [
                'name' => 'Kelas 1',
                'price' => 100000,
            ],
            [
                'name' => 'Kelas 2',
                'price' => 200000,
            ],
            [
                'name' => 'Kelas 3',
                'price' => 300000,
            ],
            [
                'name' => 'VIP',
                'price' => 400000,
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
