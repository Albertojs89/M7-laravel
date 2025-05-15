<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::insert([
            [
                'user_id' => 1,
                'clicks' => 23,
                'points' => 10,
                'duration' => null
            ],
            [
                'user_id' => 2,
                'clicks' => 15,
                'points' => 150,
                'duration' => null
            ],
            [
                'user_id' => 3,
                'clicks' => 40,
                'points' => 30,
                'duration' => null
            ],
            [
                'user_id' => 3,
                'clicks' => 47,
                'points' => 30,
                'duration' => null
            ]
        ]);
    }
}
