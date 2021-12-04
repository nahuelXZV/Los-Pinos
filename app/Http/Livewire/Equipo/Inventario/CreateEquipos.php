<?php

namespace App\Http\Livewire\Equipo\Inventario;

use App\Models\almacen;
use App\Models\equipo;
use Livewire\Component;

class CreateEquipos extends Component
{ 
    //Atributo de la vista
    public $open = false;

    //Atributos de la clase
    public $multiplicity, $stock, $estadoFuncionamiento, $estadoServicio,
     $codigo, $nombre, $modelo, $marca, $descripcion;
    public $idAlmacen = 1;

    //Validaciones del formulario
    protected $rules = [
        'nombre' => 'required|max:30',
        'modelo' => 'max:10',
        'marca' => 'max:10',
        'descripcion' => 'max:150',
        'estadoFuncionamiento' => 'required',
        'estadoServicio' => 'required',
        'idAlmacen' => 'required|max:10',

    ];

    //Mensajes de Validaciones
    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'estadoFuncionamiento.required' => 'El campo Estado de Funcionamiento es obligatorio.',
        'estadoServicio.required' => 'El campo Estado de Servicio es obligatorio.',
        'idAlmacen.required' => 'El campo ID del Almacen es obligatorio.',
    ];

    //Método para guardar
    public function save(){

        if($this->stock > 0 )
        {
            $this->multiplicity = "Multiple";
            $this->estadoFuncionamiento = "Buen Estado";
        }else{
            $this->multiplicity = "Unico";
        }

        $this->validate();

        equipo::create([
            'nombre' => $this->nombre,
            'modelo' => $this->modelo,
            'marca' => $this->marca,
            'descripcion' => $this->descripcion,
            'multiplicidad' => $this->multiplicity,
            'stock' => $this->stock,
            'estadoServicio' => $this->estadoServicio,
            'estadoFuncionamiento' => $this->estadoFuncionamiento,
            'idAlmacen' => $this->idAlmacen, 
        ]);

        $this->reset(['open', 'nombre', 'modelo', 'marca', 'descripcion', 'multiplicity', 'stock', 'estadoServicio', 'estadoFuncionamiento', 'idAlmacen']);

        $this->emitTo('equipo.inventario.show-equipos', 'render');
        $this->emit('alert', '¡El equipo se creó satisfactoriamente!');
    }

    //Método para renderizar la vista
    public function render()
    {
        $almacens = almacen::all();
        return view('livewire.equipo.inventario.create-equipos', compact('almacens'));
    }
}
