<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pertenece extends Model
{
    use HasFactory;
    protected $fillable = ['idVivienda', 'idResidente'];
}
