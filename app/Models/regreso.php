<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regreso extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'idRegresoEquipo', 'codigoEquipo', 'estadoDevolucion'];
    protected $primaryKey = 'id';
}
