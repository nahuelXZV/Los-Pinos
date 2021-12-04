<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bitacora extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'fecha', 'hora', 'accion', 'idUsuario'];


    // relacion de muchos a uno
    public function user()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }
}
