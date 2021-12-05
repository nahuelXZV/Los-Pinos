<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salidaEquipo extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'fecha', 'hora', 'motivo', 'codigoPersonal'];
    protected $primaryKey = 'id';

       // relacion de muchos a uno 
    public function personal(){
        return $this->belongsTo(personal::class, 'codigoPersonal');
    } 

    // relacion de muchos a muchos 
    public function saco(){
        return $this->belongsToMany(equipo::class, 'sacos', 'idSalidaEquipo', 'codigoEquipo')
            ->as('saco')
            ->withPivot('id', 'codigoEquipo', 'idSalidaEquipo', 'estadoSalida', 'stockRequerido');
    }

     // relacion de uno a muchos 
     public function regresoEquipo(){
        return $this->hasMany(regresoEquipo::class, 'idSalidaEquipo');
    } 

}
