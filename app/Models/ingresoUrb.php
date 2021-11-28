<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingresoUrb extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'fecha', 'hora', 'motivo', 'idVivienda', 'idMotorizado'];

    public function vivienda()
    {
        return $this->belongsTo(vivienda::class, 'idVivienda');
    }

    public function motorizado()
    {
        return $this->belongsTo(motorizado::class, 'idMotorizado');
    }

    public function ingresoV()
    {
        return $this->belongsToMany(visitante::class, 'ingreso_v_s', 'idIngresoUrb', 'idVisitante')
            ->as('ingresoV')
            ->withPivot('id', 'idVisitante', 'idIngresoUrb');
    }

    public function ingresoR()
    {
        return $this->belongsToMany(residente::class, 'ingreso_r_s', 'idIngresoUrb', 'idResidente')
            ->as('ingresoR')
            ->withPivot('id', 'idResidente', 'idIngresoUrb');
    }
}
