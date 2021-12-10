<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seccion extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'calle', 'manzano'];

    // relacion de uno a muchos
    public function trabajo(){
        return $this->hasMany(trabajo::class);
    }
}
