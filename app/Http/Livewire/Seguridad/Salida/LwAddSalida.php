<?php

namespace App\Http\Livewire\Seguridad\Salida;

use App\Models\bitacora;
use App\Models\motorizado;
use App\Models\salidaUrb;
use Livewire\Component;

class LwAddSalida extends Component
{
    public $open_add = false;
    public $ingreso;
    public $fecha;
    public $hora;
    public $idMotorizado;

    protected $rules = [
        'fecha' => 'required',
        'hora' => 'required',
    ];
    protected $messages = [
        'fecha.required' => 'El campo fecha es obligatorio.',
        'hora.required' => 'El campo hora es obligatorio.',
    ];

    public function mount()
    {
        $primero = motorizado::all()->first();
        $this->idMotorizado = $primero->id;
        $this->identify = rand();
    }

    public function save()
    {
        $this->validate();
        salidaUrb::create([
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'idMotorizado' => $this->idMotorizado
        ]);
        $iding = salidaUrb::latest()->first();
        $bitacora = new bitacora();
        $bitacora->crear('Añadió una salida con código: ' . $iding->id);
        $this->reset(['open_add', 'fecha', 'hora', 'idMotorizado']);
        $primero = motorizado::all()->first();
        $this->idMotorizado = $primero->id;
        $this->identify = rand();
        $this->emit('actualizar');
    }
    public function render()
    {
        $motorizados = motorizado::all();
        return view('livewire.seguridad.salida.lw-add-salida', compact('motorizados'));
    }
}
