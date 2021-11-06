<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class areaComun extends Model
{
    use HasFactory;
    protected $fillable = ['codigo', 'nombre', 'calle', 'manzano', 'EstadoRes'];

    public function reserva()
    {
        return $this->hasMany(reserva::class);
    }
    public function reporteAC()
    {
        return $this->hasMany(reporteAc::class);
    }
}
