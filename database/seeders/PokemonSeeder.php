<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\pokemon;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //crea un seed de 10 pokemons con los campos name y image
        pokemon::insert([
            [
                'name' => 'Pikachu',
                'image' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png',
                'category_id' => 1
            ],
            [
                'name' => 'Charmander',
                'image' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/4.png',
                'category_id' => 1
            ],
            [
                'name' => 'Bulbasaur',
                'image' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png',
                'category_id' => 3
            ],
            [
                'name' => 'Squirtle',
                'image' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/7.png',
                'category_id' => 2
            ],
            [
                'name' => 'Jigglypuff',
                'image' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/39.png',
                'category_id' => 5
            ],
            [
                'name' => 'Meowth',
                'image' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/52.png',
                'category_id' => 2
            ],
            [
                'name' => 'Psyduck',
                'image' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/54.png',
                'category_id' => 8
            ],
            [
                'name' => 'Machop',
                'image' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/66.png',
                'category_id' => 2
            ],
            [
                'name' => 'Magnemite',
                'image' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/81.png',
                'category_id' => 2
            ],
            [
                'name' => 'Poliwag',
                'image' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/60.png',
                'category_id' => 4
            ]
        ]);
    }
}
