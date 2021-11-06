<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salidaR extends Model
{
    use HasFactory;
    protected $fillable = ['idResidente', 'idSalidaUrb'];
}
