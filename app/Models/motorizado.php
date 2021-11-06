<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motorizado extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'placa', 'descripcion', 'idResidente', 'idVisitante'];


    public function residente()
    {
        return $this->belongsTo(residente::class);
    }

    public function visitante()
    {
        return $this->belongsTo(visitante::class);
    }

    public function ingresoUrb()
    {
        return $this->hasMany(ingresoUrb::class);
    }
    public function salidaUrb()
    {
        return $this->hasMany(salidaUrb::class);
    }
}
