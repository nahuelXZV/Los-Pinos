<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salidaUrb extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'fecha', 'hora', 'idMotorizado'];

    public function motorizado()
    {
        return $this->belongsTo(motorizado::class, 'idMotorizado');
    }
    
    public function salidaV()
    {
        return $this->belongsToMany(visitante::class, 'salida_v_s', 'idSalidaUrb', 'idVisitante')
            ->as('salidaV')
            ->withPivot('id', 'idVisitante', 'idSalidaUrb');
    }

    public function salidaR()
    {
        return $this->belongsToMany(residente::class, 'salida_r_s', 'idSalidaUrb', 'idResidente')
            ->as('salidaR')
            ->withPivot('id', 'idResidente', 'idSalidaUrb');
    }
}
