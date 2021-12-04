<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saco extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'idSalidaEquipo', 'codigoEquipo', 'stockRequerido', 'estadoSalida'];
    protected $primaryKey = 'id';

    public function salidaEquipo()
    {
        return $this->belongsTo(salidaEquipo::class, 'idSalidaEquipo');
    }

}
