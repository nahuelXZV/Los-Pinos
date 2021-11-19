<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salidaUrb extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'fecha', 'hora','idMotorizado'];

    public function motorizado()
    {
        return $this->belongsTo(motorizado::class);
    }
}
