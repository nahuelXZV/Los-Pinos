<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salidaAc extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'hora', 'fecha', 'idVisitante', 'codigoRes'];

    public function visitante()
    {
        return $this->belongsTo(visitante::class);
    }
    public function reserva()
    {
        return $this->belongsTo(reserva::class);
    }
}
