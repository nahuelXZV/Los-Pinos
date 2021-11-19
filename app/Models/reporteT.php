<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reporteT extends Model
{
    use HasFactory;

    // relacion de muchos a uno
    public function personal(){
        return $this->belongsTo(personal::class);
    }

    // relacion de uno a muchos
    public function realizo(){
        return $this->hasMany(realizo::class);
    }
}
