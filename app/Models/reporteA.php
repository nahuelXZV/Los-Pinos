<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reporteA extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'fecha', 'codigoPersonal'];


    // relacion de muchos a uno
    public function personal(){
        return $this->belongsTo(personal::class, 'codigoPersonal');
    }

    // relacion de uno a muchos
    public function permiso(){
        return $this->hasMany(permiso::class, 'idReporteA');
    }

    // relacion de uno a muchos
    public function ingresoPersonal(){
        return $this->hasMany(ingresoPersonal::class, 'idReporteA');
    }

    // relacion de uno a muchos
    public function salidaPersonal(){
        return $this->hasMany(salidaPersonal::class, 'idReporteA');
    }
}
