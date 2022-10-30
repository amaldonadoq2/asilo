<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposSangre extends Model
{
    use HasFactory;
    protected $table = 'tipos_sangre';
    protected $fillable = ['nombre'];
}
