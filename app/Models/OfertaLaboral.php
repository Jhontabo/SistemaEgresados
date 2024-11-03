<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaLaboral extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'empresa',
        'ubicacion',
        'fecha_publicacion',
        'salario',
        // agrega aquí otros campos que quieras permitir para asignación masiva
    ];


    protected $casts = [
        'fecha_publicacion' => 'datetime',
    ];
}
