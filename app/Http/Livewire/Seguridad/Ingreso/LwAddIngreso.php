<?php

namespace App\Http\Livewire\Seguridad\Ingreso;

use App\Models\ingresoUrb;
use App\Models\motorizado;
use App\Models\vivienda;
use Livewire\Component;

class LwAddIngreso extends Component
{
    public $open = false;
    public $ingreso;
    public $fecha;
    public $hora;
    public $motivo;
    public $idVivienda = null;
    public $idMotorizado = null;
    
    protected $rules = [
        'fecha' => 'required',
        'hora' => 'required',
        'motivo' => 'required|max:50',
    ];
    public function save()
    {
        $this->validate();
        ingresoUrb::create([
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'motivo' => $this->motivo,
            'idVivienda' => $this->idVivienda,
            'idMotorizado' => $this->idMotorizado
        ]);
        $this->reset(['open', 'fecha', 'hora', 'motivo', 'idVivienda', 'idMotorizado']);
        $this->identify = rand();
        $this->emit('actualizar');
    }
    public function render()
    {
        $viviendas = vivienda::all();
        $motorizados = motorizado::all();
        return view('livewire.seguridad.ingreso.lw-add-ingreso', compact('viviendas', 'motorizados'));
    }
}
