<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'admin',
                'email' => 'gitano@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
                'password' => bcrypt('password123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'María López',
                'email' => 'maria.lopez@example.com',
                'password' => bcrypt('password123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Carlos García',
                'email' => 'carlos.garcia@example.com',
                'password' => bcrypt('password123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Laura Torres',
                'email' => 'laura.torres@example.com',
                'password' => bcrypt('password123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Miguel Fernández',
                'email' => 'miguel.fernandez@example.com',
                'password' => bcrypt('password123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ana Martín',
                'email' => 'ana.martin@example.com',
                'password' => bcrypt('password123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'José Gómez',
                'email' => 'jose.gomez@example.com',
                'password' => bcrypt('password123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Clara Ruiz',
                'email' => 'clara.ruiz@example.com',
                'password' => bcrypt('password123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pedro Ramírez',
                'email' => 'pedro.ramirez@example.com',
                'password' => bcrypt('password123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
