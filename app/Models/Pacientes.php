<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;

    protected $table = 'pacientes';
    protected $fillable = [
        "uuid",
        "id_miembro",
        "enfermedad",
        "id_medico",
        "fecha_atencion",
        "observaciones",
        "medicamentos_recetados",
        "acompaniante",
        "telefono_acompaniante",
        "tipo_acompaniante"
    ];
}
