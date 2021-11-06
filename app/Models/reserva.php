<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'fecha', 'horaIni', 'horaFin', 'cantPers', 'idResidente', 'codigoAC'];

    public function areaComun()
    {
        return $this->belongsTo(areaComun::class);
    }
    public function residente()
    {
        return $this->belongsTo(residente::class);
    }
    public function reporteAC()
    {
        return $this->hasMany(reporteAc::class);
    }
    public function invitado()
    {
        return $this->belongsToMany(visitante::class, 'invitado', 'idVisitante', 'codigoRes')
            ->as('invitado')
            ->withPivot('idVisitante', 'codigoRes');
    }
    public function ingresoAC()
    {
        return $this->hasMany(ingresoAc::class);
    }
    public function salidaAC()
    {
        return $this->hasMany(salidaAc::class);
    }
}
