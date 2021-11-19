<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reporteA extends Model
{
    use HasFactory;

    // relacion de muchos a uno
    public function personal(){
        return $this->belongsTo(personal::class);
    }

    // relacion de uno a muchos
    public function permiso(){
        return $this->hasMany(permiso::class);
    }

    // relacion de uno a muchos
    public function ingresoPersonal(){
        return $this->hasMany(ingresoPersonal::class);
    }

    // relacion de uno a muchos
    public function salidaPersonal(){
        return $this->hasMany(salidaPersonal::class);
    }
}
