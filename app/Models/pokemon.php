<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pokemon extends Model
{
public $timestamps = false;

    use HasFactory;
    protected $table = 'pokemons';
    //explica que es esto del fillable
    //con un seeder se pueden insertar datos en la base de datos sin tener que especificar cada uno de los campos
    //sin el fillable no se insertarian los datos en la base de datos


    //El fillable es una propiedad de Eloquent que permite especificar qué atributos se pueden asignar masivamente.
    protected $fillable = [
        'name',
        'image',
        'category_id'
    ];
}
