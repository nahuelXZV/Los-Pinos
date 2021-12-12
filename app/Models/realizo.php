<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class realizo extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'hora', 'idTrabajo', 'idReporteT'];

    // relacion de muchos a uno
    public function reporteT(){
        return $this->belongsTo(reporteT::class, 'idReporteT');
    }

    // relacion de muchos a uno
    public function trabajo(){
        return $this->belongsTo(trabajo::class, 'idTrabajo');
    }
}
