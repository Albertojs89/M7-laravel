<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    public $timestamps = false; // Desactiva els timestamps automàtics de Laravel
    use HasFactory;
    protected $fillable = ['user_id', 'clicks', 'points', 'duration'];

    //Relació amb usuari: cada partida pertany a un usuari
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
