<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class almacen extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nombre', 'calle', 'manzano'];

    // relacion de uno a muchos 
    public function equipo(){
        return $this->hasMany(equipo::class, 'idAlmacen');
    }

}
