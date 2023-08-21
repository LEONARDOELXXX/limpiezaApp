<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_area',
        'horario',
        'estatus',
        'atentida'
    ];
}
