<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'fecha', 'horaIni', 'horaFin', 'cantsPers', 'title', 'start', 'end', 'idResidente', 'codigoAC'];

    public function VareaComun()
    {
        return $this->belongsTo(areaComun::class, 'codigoAC');
    }
    public function Vresidente()
    {
        return $this->belongsTo(residente::class, 'idResidente');
    }

    public function reporteAC()
    {
        return $this->hasMany(reporteAc::class, 'codigoRes');
    }
    public function invitado()
    {
        return $this->belongsToMany(visitante::class, 'invitados', 'codigoRes', 'idVisitante')
            ->as('invitado')
            ->withPivot('id', 'codigoRes', 'idVisitante', 'horaIngreso', 'horaSalida');
    }
}
