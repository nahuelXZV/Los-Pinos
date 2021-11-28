<?php

namespace App\Http\Livewire\Seguridad\Motorizado;

use App\Models\motorizado;
use App\Models\residente;
use App\Models\visitante;
use Livewire\Component;

class LwAddMotorizado extends Component
{
    public $open = false;
    public $placa;
    public $descripcion;
    public $idResidente = null;
    public $idVisitante = null;

    protected $rules = [
        'placa' => 'required'
    ];

    public function save()
    {
        $this->validate();
        if ($this->idResidente != null) {
            motorizado::create([
                'placa' => $this->placa,
                'descripcion' => $this->descripcion,
                'idResidente' => $this->idResidente
            ]);
        } else {
            motorizado::create([
                'placa' => $this->placa,
                'descripcion' => $this->descripcion,
                'idVisitante' => $this->idVisitante
            ]);
        };
        $this->reset(['open', 'descripcion', 'placa', 'idVisitante', 'idResidente']);
        $this->emit('actualizar');
    }

    public function mount()
    {
        $this->identify = rand();
    }

    public function render()
    {
        $residentes = residente::all();
        $visitantes = visitante::all();
        return view('livewire.seguridad.motorizado.lw-add-motorizado', compact('residentes', 'visitantes'));
    }
}
