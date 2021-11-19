<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personal extends Model
{
    use HasFactory;

    // relacion de uno a muchos
    public function reporteT(){
        return $this->hasMany(reporteT::class);
    }

     // relacion de uno a muchos
    public function reporteA(){
        return $this->hasMany(reporteA::class);
    }

    // relacion de muchos a muchos
    public function horario(){
        return $this->belongsToMany(horario::class);
    }

    // relacion de uno a muchos
    public function salidaEquipo(){
        return $this->hasMany(salidaEquipo::class);
    }

      // relacion de uno a muchos
    public function ingresoEquipo(){
        return $this->hasMany(regresoEquipo::class);
    }
}