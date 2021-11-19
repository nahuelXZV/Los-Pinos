<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class almacen extends Model
{
    use HasFactory;

    // relacion de uno a muchos 
    public function equipo(){
        return $this->belongsTo(equipo::class);
    }

}
