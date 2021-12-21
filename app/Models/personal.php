<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class personal extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'nombre', 'carnet', 'telefono', 'direccion', 'fechaNac', 'nacionalidad', 'sexo', 'estadoCivil', 'email', 'cargo', 'estado']; 
    protected $primaryKey = "codigo";

    // relacion de uno a muchos
    public function reporteT()
    {
        return $this->hasMany(reporteT::class, 'codigoPersonal');
    }

    // relacion de uno a muchos
    public function reporteA()
    {
        return $this->hasMany(reporteA::class, 'codigoPersonal');
    }

    // relacion de muchos a muchos 
    public function horarioPersonal(){
        return $this->belongsToMany(horario::class, 'horario_personals', 'codigoPersonal', 'idHorario')
                ->as('horarioPersonal')
                ->withPivot('id', 'idHorario', 'codigoPersonal');
    }  


    // relacion de uno a muchos
    public function salidaEquipo(){
        return $this->hasMany(salidaEquipo::class, 'codigoPersonal');
    }

      // relacion de uno a muchos
    public function ingresoEquipo(){
        return $this->hasMany(regresoEquipo::class, 'codigoPersonal');
    }

    public function Vpersonal()
    {
        return $this->hasMany(personal::class, 'codigoPersonal');
    }
}
