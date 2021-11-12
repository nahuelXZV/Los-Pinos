<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class areaComun extends Model
{
    use HasFactory;
    protected $fillable = ['codigo', 'nombre', 'calle', 'manzano', 'estadoRes'];
    protected $primaryKey = 'codigo';

    public function Vreserva()
    {
        return $this->hasMany(reserva::class, 'codigoAC');
    }
    public function reporteAC()
    {
        return $this->hasMany(reporteAc::class, 'codigoAC');
    }
}
