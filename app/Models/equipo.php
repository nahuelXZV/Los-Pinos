<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipo extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'nombre', 'modelo', 'marca', 'descripcion', 'multiplicidad', 'stock', 'estadoServicio', 'estadoFuncionamiento', 'idAlmacen']; 
    protected $primaryKey = "codigo";

    // relacion de muchos a muchos 
    public function salidaEquipo(){
        return $this->belongsToMany(salidaEquipo::class);
    }  

    // relacion de muchos a uno 
    public function almacen(){
        return $this->belongsTo(almacen::class);
    }

}
