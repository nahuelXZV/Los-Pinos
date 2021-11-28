<?php

namespace App\Http\Livewire\Equipo;

use App\Models\equipo;
use Livewire\Component;

class EditEquipos extends Component
{
    public $open = false;
    public $equipo;
    public $identify;

    public $codigo, $nombre, $modelo, $marca, $descripcion, $stock, 
    $multiplicidad, $estadoServicio, $estadoFuncionamiento, $idAlmacen;

    protected $listeners = ['delete' => 'delete'];

    protected $rules = [
        'codigo' => 'required',
        'nombre' => 'required',
        'modelo' => '',
        'marca' => '',
        'descripcion' => '',
        'stock' => '',
        'multiplicidad' => 'required',
        'estadoServicio' => 'required',
        'estadoFuncionamiento' => 'required',
        'idAlmacen' => 'required'
    ];

    public function mount($equipo)
    {
        $this->equipo = equipo::find($equipo);
        $this->identify = rand();
    }

    public function render()
    {
        return view('livewire.equipo.edit-equipos');
    }

    public function open()
    {
        $this->codigo = $this->equipo->codigo;
        $this->nombre = $this->equipo->nombre;
        $this->modelo = $this->equipo->modelo;
        $this->marca = $this->equipo->marca;
        $this->descripcion = $this->equipo->descripcion;
        $this->stock = $this->equipo->stock;
        $this->multiplicidad = $this->equipo->multiplicidad;
        $this->estadoServicio = $this->equipo->estadoServicio;
        $this->estadoFuncionamiento = $this->equipo->estadoFuncionamiento;
        $this->idAlmacen = $this->equipo->idAlmacen; 
        $this->open = true;
    }

    public function update()
    {
        $this->validate();

        $this->equipo->nombre = $this->nombre;
        $this->equipo->modelo = $this->modelo;
        $this->equipo->marca = $this->marca;
        $this->equipo->descripcion = $this->descripcion;
        $this->equipo->stock = $this->stock;
        $this->equipo->multiplicidad = $this->multiplicidad;
        $this->equipo->estadoServicio = $this->estadoServicio;
        $this->equipo->estadoFuncionamiento = $this->estadoFuncionamiento;
        $this->equipo->idAlmacen = $this->idAlmacen;

        $this->equipo->save();

        $this->reset(['open', 'nombre', 'modelo', 'marca', 'descripcion', 'stock', 'multiplicidad', 'estadoServicio', 'estadoFuncionamiento', 'idAlmacen']);
        $this->identify = rand();
        $this->emitTo('equipo.show-equipos', 'render');
        $this->emit('alert', '¡El equipo se actualizó satisfactoriamente!');
    }
}
