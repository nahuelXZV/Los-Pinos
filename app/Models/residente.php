<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class residente extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nombre', 'sexo', 'nroCarnet', 'telefono', 'tipoResidente', 'idVivienda'];


    //recibe el id de vivienda
    public function Vvivienda()
    {
        return $this->belongsTo(vivienda::class, 'idVivienda');
    }

    public function pertenece()
    {
        return $this->belongsToMany(vivienda::class, 'perteneces', 'idVivienda', 'idResidente')
            ->as('pertenece')
            ->withPivot('idVivienda', 'idResidente');
    }

    public function motorizado()
    {
        return $this->hasMany(motorizado::class, 'idResidente');
    }

    public function salidaR()
    {
        return $this->belongsToMany(salidaUrb::class, 'salida_r_s', 'idResidente', 'idSalidaUrb')
            ->as('salidaR')
            ->withPivot('id','idResidente', 'idSalidaUrb');
    }
    public function ingresoR()
    {
        return $this->belongsToMany(ingresoUrb::class, 'ingreso_r_s', 'idResidente', 'idIngresoUrb')
            ->as('ingresoR')
            ->withPivot('id','idResidente', 'idIngresoUrb');
    }

    public function Vreserva()
    {
        return $this->hasMany(reserva::class, 'idResidente');
    }
}
