<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address'
    ];
}
