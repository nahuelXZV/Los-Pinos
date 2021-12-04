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
    public $multiplicity = "Único", $stock, $estadoFuncionamiento = 'Buen Estado', $estadoServicio = 'Activo',
        $codigo, $nombre, $modelo, $marca, $descripcion;
    public $idAlmacen;

    //Validaciones del formulario
    protected $rules = [
        'nombre' => 'required|max:30',
        'modelo' => 'max:10',
        'marca' => 'max:10',
        'multiplicity' => 'required|string',
        'descripcion' => 'max:150',
        'estadoFuncionamiento' => 'required',
        'estadoServicio' => 'required',
        'idAlmacen' => 'required|max:10',

    ];

    //Mensajes de Validaciones
    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'estadoFuncionamiento.required' => 'El campo Estado de Funcionamiento es obligatorio.',
        'multiplicity.required' => 'El campo tipo de equipos es obligatorio.',
        'estadoServicio.required' => 'El campo Estado de Servicio es obligatorio.',
        'idAlmacen.required' => 'El campo código del Almacen es obligatorio.',
    ];

    //Inicializador
    public function mount()
    {
        $almacen = almacen::all()->first();
        $this->idAlmacen = $almacen->id;
        $this->identify = rand();
    }

    //Método para guardar
    public function save()
    {
        $this->validate();
        if ($this->multiplicity == "Único" && $this->stock > 1) {
            $this->reset(['open', 'nombre', 'modelo', 'marca', 'descripcion', 'multiplicity', 'stock', 'estadoServicio', 'estadoFuncionamiento', 'idAlmacen']);
            $this->emit('alert', 'Tipo de equipo y stock incorrecto');
            return;
        }
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
        $this->emit('alert', '¡El equipo se creó satisfactoriamente!');
    }

    //Método para renderizar la vista
    public function render()
    {
        $almacens = almacen::all();
        return view('livewire.equipo.inventario.create-equipos', compact('almacens'));
    }
}
