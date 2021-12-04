<?php

namespace App\Http\Livewire\Equipo\Almacen;

use App\Models\almacen;
use Livewire\Component;

class EditAlmacens extends Component
{

    //Atributos de la vista
    public $open = false;   
    public $identify;

    //Atributos de la clase
    public $almacen;
    public $nombre, $calle, $manzano;

    //Listener que se renderiza al método delete
    protected $listeners = ['delete' => 'delete'];

    //Validaciones del formulario
    protected $rules = [
        'nombre' => 'required',
        'calle' => 'required',
        'manzano' => 'required',
    ];

    //Mensajes de Validaciones
    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'calle.required' => 'El campo calle es obligatorio.',
        'manzano.required' => 'El campo manzano es obligatorio.',
    ];

    //Inicializador
    public function mount($almacen)
    {
        $this->almacen = almacen::find($almacen);
        $this->identify = rand();
    }

    //Método para renderizar la vista
    public function render()
    {
        return view('livewire.equipo.almacen.edit-almacens');
    }    

    //Método para inicializar el modal
    public function open()
    {
        $this->nombre = $this->almacen->nombre;
        $this->calle = $this->almacen->calle;
        $this->manzano = $this->almacen->manzano; 
        $this->open = true;
    }

    //Método para actualizar
    public function update()
    {
        $this->validate();

        $this->almacen->nombre = $this->nombre;
        $this->almacen->calle = $this->calle;
        $this->almacen->manzano = $this->manzano;
        $this->almacen->save();

        $this->reset(['open', 'nombre', 'calle', 'manzano']);
        $this->identify = rand();
        $this->emitTo('equipo.almacen.show-almacens', 'render');
        $this->emit('alert', 'Actualizado Correctamente');
    }
    
}
