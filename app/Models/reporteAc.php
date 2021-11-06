<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reporteAc extends Model
{
    use HasFactory;
    protected $fillable = ['codigo', 'reporte', 'codigoAC', 'codigoRes'];

    public function areaComun()
    {
        return $this->belongsTo(areaComun::class);
    }
    
    public function reserva()
    {
        return $this->belongsTo(reserva::class);
    }

}
