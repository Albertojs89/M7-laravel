<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json(['students'=>$students], 200);
    }
    public function show($id)
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json(['student'=>$student], 200);
        } else {
            return response()->json(['message'=>'Student not found'], 404);
        }
    }
    public function store(Request $request)
{
    // Validar los datos del request
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:students',
        'phone' => 'nullable|string|max:15',
        'address' => 'nullable|string|max:255',
    ]);

    // Verificar si la validación falla
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Crear el estudiante si la validación pasa
    $student = Student::create($request->all());
    return response()->json(['student' => $student], 201);

}
public function destroy($id)
{
    $student = Student::find($id);
    if ($student) {
        $student->delete();
        return response()->json(['message'=>'Student deleted successfully'], 200);
    } else {
        return response()->json(['message'=>'Student not found'], 404);
    }
}
}
