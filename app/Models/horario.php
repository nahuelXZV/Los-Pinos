<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horario extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'dia', 'horaInicio', 'horaFinal'];

     // relacion de muchos a muchos 
     public function horarioPersonal(){
        return $this->belongsToMany(personal::class, 'horario_personals', 'idHorario', 'codigoPersonal')
                ->as('horarioPersonal')
                ->withPivot('id', 'idHorario', 'codigoPersonal');
    }  

    // relacion de uno a uno
    public function user(){
        return $this->hasOne(User::class);
    } 
}
