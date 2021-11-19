<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invitado extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'idVisitante', 'codigoRes', 'horaIngreso', 'horaSalida'];
    protected $primaryKey = 'id';
}
