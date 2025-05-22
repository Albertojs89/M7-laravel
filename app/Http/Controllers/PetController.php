<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    // Ver las mascotas del usuario autenticado
    public function index()
    {
        $user = Auth::user();
        return response()->json($user->pets);
    }

    // Crear una nueva mascota
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'age'  => 'required|integer'
        ]);

        $pet = Pet::create([
            ...$validated,
            'user_id' => Auth::id()
        ]);

        return response()->json($pet, 201);
    }

    // Editar completamente una mascota propia
    public function update(Request $request, $id)
    {
        $pet = Pet::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$pet) {
            return response()->json(['error' => 'Mascota no encontrada o no autorizada'], 403);
        }

        $pet->update($request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'age'  => 'required|integer'
        ]));

        return response()->json($pet);
    }

    // Editar parcialmente una mascota propia
    public function partialUpdate(Request $request, $id)
    {
        $pet = Pet::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$pet) {
            return response()->json(['error' => 'Mascota no encontrada o no autorizada'], 403);
        }

        $pet->update($request->only(['name', 'type', 'age']));

        return response()->json($pet);
    }

    // Eliminar una mascota propia
    public function destroy($id)
    {
        $pet = Pet::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$pet) {
            return response()->json(['error' => 'Mascota no encontrada o no autorizada'], 403);
        }

        $pet->delete();

        return response()->json(['message' => 'Mascota eliminada']);
    }
}

