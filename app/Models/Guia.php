<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'tema',
        'duracion',
        'guiaPDF'
    ];

    public function users()
     {
        return $this->belongsToMany(User::class);
    }
}
