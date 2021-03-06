<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trabajo extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'actividad', 'idSeccion'];

    // relacion de uno a muchos
    public function realizo(){
        return $this->hasMany(realizo::class, 'idTrabajo');
    }

    // relacion de muchos a uno
    public function seccion(){
        return $this->belongsTo(seccion::class, 'idSeccion');
    }

}
