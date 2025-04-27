<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
            ],
            [
                'name' => 'informasi',
            ],
            [
                'name' => 'kasir',
            ],
            [
                'name' => 'dokter',
            ],
        ];

        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'informasi',
                'email' => 'informasi@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'kasir',
                'email' => 'kasir@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'dokter',
                'email' => 'dokter@example.com',
                'password' => Hash::make('password'),
            ],
        ];
        foreach ($roles as $role) { 
            Role::create($role);
        }

        foreach ($users as $user) {
            $employee = User::create($user);        
            Employee::create([
                'user_id' => $employee->id,
                'role_id' => $employee->id,
                'name' => $employee->name,
                'phone' => '081234567890',
                'address' => 'Jl. Admin',
            ]);
        }
    }
}
