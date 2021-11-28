<?php

namespace App\Http\Livewire\Equipo;

use App\Models\almacen;
use Livewire\Component;

class CreateAlmacens extends Component
{
    public $open = false;

    public $nombre, $calle, $manzano;

    protected $rules = [
        'nombre' => 'required|max:50',
        'calle' => 'required|max:50', 
        'manzano' => 'required|max:30',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();

        almacen::create([
            'nombre' => $this->nombre,
            'calle' => $this->calle,
            'manzano' => $this->manzano,
        ]);

        $this->reset(['open', 'nombre', 'calle', 'manzano']);

        $this->emitTo('equipo.show-almacens', 'render');
        $this->emit('alert', '¡El almacen se creó satisfactoriamente!');
    }

     public function render()
    {
        return view('livewire.equipo.create-almacens');
    }
}
