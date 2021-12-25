<?php

namespace App\Http\Livewire\Personal\Trabajo;

use App\Models\bitacora;
use App\Models\seccion;
use Livewire\Component;
use App\Models\trabajo;
use Illuminate\Support\Facades\DB;

class LwAddTrabajos extends Component
{

    //Atributos de la vista
    public $open_add = false;
    public $identify;

    //Atributos de la clase
    public $trabajo;
    public $idT;
    public $actividad;
    public $idSeccion;

    //Validaciones del formulario
    protected $rules = [
        'actividad' => 'required',
        'idSeccion' => 'required',
    ];

    //Mensajes de Validaciones
    protected $messages = [
        'actividad.required' => 'El campo actividad es obligatorio.',
        'idSeccion.required' => 'El codigo de seccion es obligatorio.',
    ];

    //Iniciador
    public function mount()
    {
        $this->identify = rand();
    }

    //Metodo de guardar
    public function save()
    {
        $this->validate();
        trabajo::create([
            'actividad' => $this->actividad,
            'idSeccion' => $this->idSeccion
        ]);
        $last = trabajo::latest('id')->first();
        $this->idT = $last->id;
        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió un trabajo con codigo : ' . $this->idT, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Añadió un trabajo con codigo : ' . $this->idT);
        $this->reset(['open_add', 'id', 'actividad', 'idSeccion']);
        $this->identify = rand();
        $this->emit('actualizar');
    }

    //Abrir modal de añadir
    public function open_modal_add()
    {
        $this->reset(['open_add', 'id', 'actividad', 'idSeccion']);
        $this->open_add = true;
    }
    public function render()
    {
        $secciones = seccion::all();
        return view('livewire.personal.trabajo.lw-add-trabajos', compact('secciones'));
    }
}
