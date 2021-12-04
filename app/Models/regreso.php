<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regreso extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'idRegresoEquipo', 'codigoEquipo', 'cantidadSacada', 'stockRegresado', 'stockRegresadoDañado', 'estadoDevolucion', 'fechaRegreso', 'horaRegreso'];
    protected $primaryKey = 'id';


    public function regresoEquipo()
    {
        return $this->belongsTo(regresoEquipo::class, 'idRegresoEquipo');
    }

    public function equipo()
    {
        return $this->belongsTo(equipo::class, 'codigoEquipo');
    }

}
