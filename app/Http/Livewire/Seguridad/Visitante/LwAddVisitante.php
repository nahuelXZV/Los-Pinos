<?php

namespace App\Http\Livewire\Seguridad\Visitante;

use App\Models\visitante;
use Livewire\Component;

class LwAddVisitante extends Component
{
    public $open = false;
    public $idR;
    public $nombre;
    public $numeroDeCarnet;
    public $sexo = 'M';

    protected $rules = [
        'nombre' => 'required',
        'numeroDeCarnet' => 'required',
        'sexo' => 'required',
    ];

    public function mount()
    {
        $this->identify = rand();
    }

    public function save()
    {
        $this->validate();
        visitante::create([
            'nombre' => $this->nombre,
            'nroCarnet' => $this->numeroDeCarnet,
            'sexo' => $this->sexo,
        ]);
        $this->reset(['open', 'nombre', 'numeroDeCarnet', 'sexo']);
        $this->identify = rand();
        $this->emit('actualizar');
    }

    public function render()
    {
        return view('livewire.seguridad.visitante.lw-add-visitante');
    }
}
