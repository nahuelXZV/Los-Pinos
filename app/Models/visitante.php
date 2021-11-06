<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitante extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nombre', 'nroCarnet', 'sexo'];

    public function motorizado(){
        return $this->hasMany(motorizado::class);
    }

    public function salidaV()
    {
        return $this->belongsToMany(salidaUrb::class, 'salida_v_s', 'idVisitante', 'idSalidaUrb')
            ->as('salidaV')
            ->withPivot('idVisitante', 'idSalidaUrb');
    }
    
    public function ingresoV()
    {
        return $this->belongsToMany(ingresoUrb::class, 'ingreso_v_s', 'idVisitante', 'idIngresoUrb')
            ->as('ingresoV')
            ->withPivot('idVisitante', 'idIngresoUrb');
    }

    public function invitado()
    {
        return $this->belongsToMany(reserva::class, 'invitado', 'idVisitante', 'codigoRes')
            ->as('invitado')
            ->withPivot('idVisitante', 'codigoRes');
    }
    public function ingresoAC(){
        return $this->hasMany(ingresoAc::class);
    }
    public function salidaAC(){
        return $this->hasMany(salidaAc::class);
    }
}
