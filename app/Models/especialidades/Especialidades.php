<?php

namespace App\Models\especialidades;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    use HasFactory;

    protected $table = 'especialidades';
    protected $fillable = [
        'uuid',
        'nombre'
    ];
}
