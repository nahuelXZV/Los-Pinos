<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bitacora extends Model
{
    use HasFactory;

    // relacion de muchos a uno
    public function user(){
        return $this->hasMany(User::class);
    }
}
