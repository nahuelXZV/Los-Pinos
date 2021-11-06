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
        return $this->belongsTo(vivienda::class);
    }
    
    public function motorizado()
    {
        return $this->belongsTo(motorizado::class);
    }
}
