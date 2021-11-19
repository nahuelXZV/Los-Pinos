<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vivienda extends Model
{
    use HasFactory;
    protected $fillable = ['id','calle','manzano','nroCasa','lote','estadoResidencia','estadoVivienda'];
   

    public function residente(){
        return $this->hasMany(residente::class);
    }

    public function pertenece(){
        return $this->belongsToMany(residente::class,'perteneces','idVivienda', 'idResidente')
                    ->as('pertenece')
                    ->withPivot('idVivienda','idResidente');
    }
    
    public function ingresoUrb(){
        return $this->hasMany(ingresoUrb::class);
    }
}
