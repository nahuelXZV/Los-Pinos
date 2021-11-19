<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regresoEquipo extends Model
{
    use HasFactory;

    // relacion de muchos a uno 
    public function personal(){
        return $this->belongsTo(personal::class);
    } 

    // relacion de muchos a muchos 
    public function equipo(){
        return $this->belongsToMany(equipo::class);
    } 

     // relacion de muchos a uno 
     public function regresoEquipo(){
        return $this->belongsTo(regresoEquipo::class);
    } 
}
