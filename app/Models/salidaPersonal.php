<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salidaPersonal extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'hora', 'idReporteA'];


    // relacion de muchos a uno
    public function reporteA(){
        return $this->belongsTo(reporteA::class, 'idReporteA');
    }
}
