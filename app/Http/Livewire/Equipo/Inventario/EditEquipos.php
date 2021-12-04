<?php

namespace App\Http\Livewire\Equipo\Inventario;

use App\Models\almacen;
use App\Models\equipo;
use Livewire\Component;

class EditEquipos extends Component
{
    //Atributos de la vista
    public $open = false;
    public $identify;

    //Atributos de la clase
    public $equipo;
    public $codigo, $nombre, $modelo, $marca, $descripcion, $stock,
        $multiplicidad, $estadoServicio, $estadoFuncionamiento;
    public $idAlmacen;

    //Listener que se renderiza al método delete
    protected $listeners = ['delete' => 'delete'];

    //Validaciones del formulario
    protected $rules = [
        'nombre' => 'required',
        'multiplicidad' => 'required',
        'estadoServicio' => 'required',
        'estadoFuncionamiento' => 'required',
        'idAlmacen' => 'required'
    ];

    //Mensajes de Validaciones
    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'estadoFuncionamiento.required' => 'El campo Estado de Funcionamiento es obligatorio.',
        'idAlmacen.required' => 'El campo código del Almacen es obligatorio.',
    ];

    //Inicializador
    public function mount($equipo)
    {
        $this->equipo = equipo::find($equipo);
        $almacen = almacen::all()->first();
        $this->idAlmacen = $almacen->id;
        $this->identify = rand();
    }


    //Método para inicializar el modal
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

    //Método para actualizar
    public function update()
    {
        $this->validate();
        if ($this->multiplicidad = "Único" && $this->stock > 1) {
            $this->reset(['open', 'nombre', 'modelo', 'marca', 'descripcion', 'multiplicidad', 'stock', 'estadoServicio', 'estadoFuncionamiento', 'idAlmacen']);
            $this->emit('alert', 'Tipo de equipo y stock incorrecto!');
            return;
        }
        $this->equipo->nombre = $this->nombre;
        $this->equipo->modelo = $this->modelo;
        $this->equipo->marca = $this->marca;
        $this->equipo->descripcion = $this->descripcion;
        $this->equipo->stock = $this->stock;
        $this->equipo->multiplicidad = $this->multiplicidad;
        $this->equipo->estadoFuncionamiento = $this->estadoFuncionamiento;
        $this->equipo->estadoServicio = $this->estadoServicio;
        $this->equipo->idAlmacen = $this->idAlmacen;
        $this->equipo->update();

        $this->reset(['open', 'nombre', 'modelo', 'marca', 'descripcion', 'stock', 'multiplicidad', 'estadoServicio', 'estadoFuncionamiento', 'idAlmacen']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente');
    }

    //Método para renderizar la vista
    public function render()
    {
        $almacens = almacen::all();
        return view('livewire.equipo.inventario.edit-equipos', compact('almacens'));
    }
}
