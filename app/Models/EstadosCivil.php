<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadosCivil extends Model
{
    use HasFactory;
    protected $table = 'estados_civil';
    protected $fillable = ['nombre'];
}
