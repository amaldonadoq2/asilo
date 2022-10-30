<?php

namespace App\Models\medicos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    use HasFactory;
    protected $table = 'medicos';
    protected $fillable= ['uuid','nombre','telefono','id_especialidad','salario','direccion'];
}
