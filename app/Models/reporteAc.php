<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reporteAc extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'reporte', 'codigoAC', 'codigoRes'];

    public function VareaComun()
    {
        return $this->belongsTo(areaComun::class, 'codigoAC');
    }

    public function Vreserva()
    {
        return $this->belongsTo(reserva::class, 'codigoRes');
    }
}
