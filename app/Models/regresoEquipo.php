<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regresoEquipo extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'fecha', 'hora', 'codigoPersonal', 'idSalidaEquipo'];
    protected $primaryKey = 'id';

    // relacion de muchos a uno 
    public function personal(){
        return $this->belongsTo(personal::class, 'codigoPersonal');
    } 

    // relacion de muchos a muchos 
    public function regreso(){
        return $this->belongsToMany(equipo::class, 'regresos', 'idRegresoEquipo', 'codigoEquipo')
                ->as('regreso')
                ->withPivot('id', 'codigoEquipo', 'idRegresoEquipo', 'estadoDevolucion', 'fechaRegreso', 'horaRegreso' ,'cantidadSacada', 'stockRegresado', 'stockRegresadoDañado');
        }  

     // relacion de muchos a uno 
     public function salidaEquipo(){
        return $this->belongsTo(salidaEquipo::class, 'idSalidaEquipo');
    }
}
