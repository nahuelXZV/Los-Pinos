<?php

namespace App\Http\Livewire\Seguridad\Ingreso;

use App\Models\bitacora;
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

    protected $messages = [
        'fecha.required' => 'El campo fecha es obligatorio.',
        'hora.required' => 'El campo hora es obligatorio.',
        'motivo.required' => 'El campo motivo es obligatorio.'
    ];

    public function mount()
    {
        $this->identify = rand();
        $m = motorizado::all()->first();
        $v = vivienda::all()->first();
        $this->idMotorizado = $m->id;
        $this->idVivienda = $v->id;
    }

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
        $iding = ingresoUrb::latest()->first();
        $bitacora = new bitacora();
        $bitacora->crear('Añadió un ingreso con código: ' . $iding->id);
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
