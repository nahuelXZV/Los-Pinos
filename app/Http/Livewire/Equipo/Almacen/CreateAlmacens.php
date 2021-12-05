<?php

namespace App\Http\Livewire\Equipo\Almacen;

use App\Models\almacen;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreateAlmacens extends Component
{

    //Atributo de la vista
    public $open = false;

    //Atributos de la clase
    public $idA, $nombre, $calle, $manzano;

    //Validaciones del formulario
    protected $rules = [
        'nombre' => 'required|max:50',
        'calle' => 'required|max:50',
        'manzano' => 'required|max:30',
    ];

    //Mensajes de Validaciones
    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'calle.required' => 'El campo calle es obligatorio.',
        'manzano.required' => 'El campo manzano es obligatorio.',
    ];


    //Método para guardar
    public function save()
    {
        $this->validate();
        almacen::create([
            'nombre' => $this->nombre,
            'calle' => $this->calle,
            'manzano' => $this->manzano,
        ]);
        $last = almacen::latest('id')->first();
        $this->idA = $last->id;
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió el almacén: ' . $this->nombre . ' con ID: ' . $this->idA , auth()->user()->id]);
        $this->reset(['open', 'idA', 'nombre', 'calle', 'manzano']);

        $this->emitTo('equipo.almacen.show-almacens', 'render');
        $this->emit('alert', '¡El almacen se creó satisfactoriamente!');
    }

    //Método para renderizar la vista
    public function render()
    {
        return view('livewire.equipo.almacen.create-almacens');
    }
}
