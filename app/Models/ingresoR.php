<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingresoR extends Model
{
    use HasFactory;
    protected $fillable = ['idResidente', 'idIngresoUrb'];
    protected $primaryKey = 'id';
}
