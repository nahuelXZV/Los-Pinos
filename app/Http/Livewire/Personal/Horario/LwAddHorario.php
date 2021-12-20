<?php

namespace App\Http\Livewire\Personal\Horario;

use Livewire\Component;
use App\Models\horario;
use Illuminate\Support\Facades\DB;

class LwAddHorario extends Component
{
    //Atributos de la vista
    public $open_add = false;
    public $identify;

    //Atributos de la clase
    //public $id;
    public $dia;
    public $horaInicio;
    public $horaFinal;

    //Validaciones del formulario
    protected $rules = [
        'dia' => 'required',
        'horaInicio' => 'required',
        'horaFinal' => 'required',
    ];

    //Mensajes de Validaciones
    protected $messages = [
        'dia.required' => 'El campo dia es obligatorio.',
        'horaInicio.required' => 'El campo hora de inicio es obligatorio.',
        'horaFinal.required' => 'El campo hora final es obligatorio.',
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
        horario::create([
            'dia' => $this->dia,
            'horaInicio' => $this->horaInicio,
            'horaFinal' => $this->horaFinal,
        ]);
        $last = horario::latest('id')->first();
        $this->id = $last->id;
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió un horario con código: ' . $this->id, auth()->user()->id]);
        $this->reset(['open_add', 'id', 'dia', 'horaInicio', 'horaFinal']);
        $this->identify = rand();
        $this->emit('actualizar');
    }

    //Abrir modal de añadir
    public function open_modal_add()
    {
        $this->reset(['open_add', 'id', 'dia', 'horaInicio', 'horaFinal']);
        $this->open_add = true;
    }

    public function render()
    {
        return view('livewire.personal.horario.lw-add-horario');
    }
}
