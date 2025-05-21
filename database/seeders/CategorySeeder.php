<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'name' => 'Fuego',
                'id'=> 1,
            ],
            [
                'name' => 'Agua',
                'id'=> 2,
            ],
            [
                'name' => 'Planta',
                'id'=> 3,
            ],
            [
                'name' => 'Electrico',
                'id'=> 4,
            ],
            [
                'name' => 'Normal',
                'id'=> 5,
            ],
            [
                'name' => 'Lucha',
                'id'=> 6,
            ],
            [
                'name' => 'Roca',
                'id'=> 7,
            ],
            [
                'name' => 'Psíquico',
                'id'=> 8,
            ],


        ]);
    }
}
