<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipo extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'nombre', 'modelo', 'marca', 'descripcion', 'multiplicidad', 'stock', 'stockFaltante' , 'estadoServicio', 'estadoFuncionamiento', 'idAlmacen']; 
    protected $primaryKey = "codigo";

    // relacion de muchos a muchos 
    public function saco(){
        return $this->belongsToMany(salidaEquipo::class, 'sacos', 'codigoEquipo', 'idSalidaEquipo')
                ->as('saco')
                ->withPivot('id', 'codigoEquipo', 'idSalidaEquipo', 'estadoSalida', 'stockRequerido');
    }  

     // relacion de muchos a muchos 
     public function regreso(){
        return $this->belongsToMany(regresoEquipo::class, 'regresos', 'codigoEquipo', 'idRegresoEquipo')
                ->as('regreso')
                ->withPivot('id', 'codigoEquipo', 'idRegresoEquipo', 'estadoDevolucion' , 'fechaRegreso', 'horaRegreso' , 'cantidadSacada' ,'stockRegresado', 'stockRegresadoDañado');
    }  

    // relacion de muchos a uno 
    public function almacen(){
        return $this->belongsTo(almacen::class, 'idAlmacen');
    }

    public function equipo()
    {
        return $this->hasMany(regreso::class, 'codigoEquipo');
    }

}
