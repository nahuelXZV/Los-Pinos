<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horarioPersonal extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'idHorario', 'codigoPersonal'];
    

    
}
