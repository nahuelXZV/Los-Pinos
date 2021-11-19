<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permiso extends Model
{
    use HasFactory;

    // relacion de muchos a uno
    public function reporteA(){
        return $this->belongsTo(reporteA::class);
    }
}
