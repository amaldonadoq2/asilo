<?php

namespace App\Models\miembros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miembros extends Model
{
    use HasFactory;

    protected $table = 'miembros';
    protected $fillable = [
        'uuid', 
        'cui', 
        'nombre',
        'apellido',
        'encargado', 
        'direccion', 
        'telefono',
        'enfermedades',
        'id_tipo_sangre',
        'fecha_nacimiento',
        'id_genero',
        'id_estado_civil'
    ];
}
