<?php

namespace App\Http\Livewire\Equipo;

use App\Models\salidaEquipo;
use Livewire\Component;

class EditSalidaEquipos extends Component
{

    public $open = false;
    public $almacen;
    public $identify;

    public $nombre, $calle, $manzano;

    protected $listeners = ['delete' => 'delete'];

    protected $rules = [
        'nombre' => 'required',
        'calle' => 'required',
        'manzano' => 'required',
    ];

    public function mount($almacen)
    {
        $this->almacen = almacen::find($almacen);
        $this->identify = rand();
    }
    public function render()
    {
        return view('livewire.equipo.edit-almacens');
    }    

    public function open()
    {
        $this->nombre = $this->almacen->nombre;
        $this->calle = $this->almacen->calle;
        $this->manzano = $this->almacen->manzano; 
        $this->open = true;
    }

    public function update()
    {
        $this->validate();

        $this->almacen->nombre = $this->nombre;
        $this->almacen->calle = $this->calle;
        $this->almacen->manzano = $this->manzano;
        $this->almacen->save();

        $this->reset(['open', 'nombre', 'calle', 'manzano']);
        $this->identify = rand();
        $this->emitTo('equipo.show-almacens', 'render');
        $this->emit('alert', '¡El almacen se actualizó satisfactoriamente!');
    }
    
    
}
