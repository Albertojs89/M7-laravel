<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pokemon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class PokemonController extends Controller
{
    //index: obtiene todos los pokemones
    public function index()
    {
        $pokemons = pokemon::all();
        return response()->json(['pokemons' => $pokemons], 200);
    }
    //show: obtiene un pokemon por id
    public function show($id)
    {
        $pokemon = pokemon::find($id);
        if ($pokemon) {
            return response()->json(['pokemon' => $pokemon], 200);
        } else {
            return response()->json(['message' => 'Pokemon not found'], 404);
        }
    }
    //store: crea un nuevo pokemon
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'required|string|url',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $pokemon = pokemon::create([
            'name' => $request->name,
            'image' => $request->image,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(), // Asignar el ID del usuario autenticado
        ]);
        return response()->json(['pokemon' => $pokemon],
        201);
    }
    //update: actualiza un pokemon por id
    public function update(Request $request, $id)
    {
        $pokemon = pokemon::find($id);
        if ($pokemon) {
            $validator = Validator::make($request->all(), [
                'name' => 'string|max:255',
                'image' => 'url',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $pokemon->update($request->all());
            return response()->json(['pokemon' => $pokemon], 200);
        } else {
            return response()->json(['message' => 'Pokemon not found'], 404);
        }
    }
    //updatePartial: actualiza parcialmente un pokemon por id
    public function updatePartial(Request $request, $id)
    {
        $pokemon = pokemon::find($id);
        if ($pokemon) {
            $validator = Validator::make($request->all(), [
                'name' => 'string|max:255',
                'image' => 'url',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $pokemon->update($request->only(array_keys($request->all())));
            return response()->json(['pokemon' => $pokemon], 200);
        } else {
            return response()->json(['message' => 'Pokemon not found'], 404);
        }
    }
    //destroy: elimina un pokemon por id
    public function destroy(pokemon $card)
    {
        $user = Auth::user();
        if ($card->user_id !== $user->id && $user->role !== 'admin') {
            return response()->json(['error' => 'No autoritzat'], 403);
        }

        $card->delete();
        return response()->json(['message' => 'Targeta eliminada']);
    }

    public function getByCategory($categoryId)
    {
        $pokemons = pokemon::where('category_id', $categoryId)->get();

        return response()->json($pokemons);
    }

    public function myPokemons()
    {
        $pokemons = pokemon::where('user_id', Auth::id())->get();

        return response()->json([
            'message' => 'Les teves targetes',
            'data' => $pokemons
        ]);
    }




}
