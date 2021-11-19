<?php

namespace App\Http\Livewire\Seguridad\Residente;

use App\Models\residente;
use App\Models\vivienda;
use Livewire\Component;

class LwAddResidente extends Component
{
    public $open = false;
    public $idR;
    public $nombre;
    public $numeroDeCarnet;
    public $sexo = 'M';
    public $telefono;
    public $tipoResidente = 'Propietario';
    public $idVivienda;

    protected $rules = [
        'nombre' => 'required',
        'numeroDeCarnet' => 'required',
        'sexo' => 'required',
        'telefono' => 'required',
        'tipoResidente' => 'required',
    ];

    public function mount()
    {
        $primero = vivienda::all()->first();
        $this->idVivienda = $primero->id;
        $this->identify = rand();
    }

    public function save()
    {
        $this->validate();
        residente::create([
            'nombre' => $this->nombre,
            'nroCarnet' => $this->numeroDeCarnet,
            'sexo' => $this->sexo,
            'telefono' => $this->telefono,
            'tipoResidente' => $this->tipoResidente,
            'idVivienda' => $this->idVivienda
        ]);
        $this->reset(['open', 'nombre', 'numeroDeCarnet', 'sexo', 'telefono', 'tipoResidente', 'idVivienda']);
        $this->identify = rand();
        $this->emit('actualizar');
    }

    public function render()
    {
        $viviendas = vivienda::all();
        return view('livewire.seguridad.residente.lw-add-residente', compact('viviendas'));
    }
}
