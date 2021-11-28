<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motorizado extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'placa', 'descripcion', 'idResidente', 'idVisitante'];


    public function Vresidente()
    {
        return $this->belongsTo(residente::class, 'idResidente');
    }

    public function Vvisitante()
    {
        return $this->belongsTo(visitante::class, 'idVisitante');
    }

    public function ingresoUrb()
    {
        return $this->hasMany(ingresoUrb::class,'idMotorizado');
    }
    public function salidaUrb()
    {
        return $this->hasMany(salidaUrb::class);
    }
}
