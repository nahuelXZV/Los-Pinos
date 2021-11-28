<?php

namespace App\Http\Livewire\Equipo;

use App\Models\equipo;
use Livewire\Component;

class CreateEquipos extends Component
{ 
    public $open = false;

    public $multiplicity = "Unico";
    public $codigo, $nombre, $modelo, $marca, $descripcion, $idAlmacen;

    protected $rules = [
        'nombre' => 'required|max:30',
        'modelo' => 'max:10',
        'marca' => 'max:10',
        'descripcion' => 'max:150',
        'idAlmacen' => 'required|max:2',

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();

        equipo::create([
            'nombre' => $this->nombre,
            'modelo' => $this->modelo,
            'marca' => $this->marca,
            'descripcion' => $this->descripcion,
            'multiplicidad' => "Unico",
            'stock' => null,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => $this->idAlmacen, 
        ]);

        $this->reset(['open', 'nombre', 'modelo', 'marca', 'descripcion', 'idAlmacen']);

        $this->emitTo('equipo.show-equipos', 'render');
        $this->emit('alert', '¡El equipo se creó satisfactoriamente!');
    }

    public function render()
    {
        return view('livewire.equipo.create-equipos');
    }

    public function check()
    {
           $this->multiplicity = "Multiple";        
    }
}
