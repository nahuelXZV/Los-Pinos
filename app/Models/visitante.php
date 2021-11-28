<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitante extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nombre', 'nroCarnet', 'sexo'];

    public function Vmotorizado()
    {
        return $this->hasMany(motorizado::class, 'idVisitante');
    }

    public function salidaV()
    {
        return $this->belongsToMany(salidaUrb::class, 'salida_v_s', 'idVisitante', 'idSalidaUrb')
            ->as('salidaV')
            ->withPivot('id', 'idVisitante', 'idSalidaUrb');
    }

    public function ingresoV()
    {
        return $this->belongsToMany(ingresoUrb::class, 'ingreso_v_s', 'idVisitante', 'idIngresoUrb')
            ->as('ingresoV')
            ->withPivot('id', 'idVisitante', 'idIngresoUrb');
    }

    public function invitado()
    {
        return $this->belongsToMany(reserva::class, 'invitados', 'idVisitante', 'codigoRes')
            ->as('invitado')
            ->withPivot('id', 'idVisitante', 'codigoRes', 'horaIngreso', 'horaSalida');
    }
}
