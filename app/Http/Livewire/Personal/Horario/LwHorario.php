<?php

namespace App\Http\Livewire\Personal\Horario;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\horario;
use App\Models\personal;
use Illuminate\Support\Facades\DB;

class LwHorario extends Component
{
    use WithPagination;

    //Atributos de vista 
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    public $open_edit = false;
    public $identify;
    protected $listeners = ['delete', 'actualizar' => 'actualizar'];

    //Atributos de la clase
    //public $id;
    public $horario;
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
        $this->horario = new horario();
    }

    //Metodo de ordenado
    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    //Metodo de reinicio de buscador
    public function updatingSearch()
    {
        $this->resetPage();
    }

    //Abrir modal de editar
    public function open_modal_edit(horario $horario)
    {
        $this->horario = $horario;
        $this->id = $this->horario->id;
        $this->dia = $this->horario->dia;
        $this->horaInicio = $this->horario->horaInicio;
        $this->horaFinal = $this->horario->horaFinal;
        $this->open_edit = true;
    }

    //Metodo de actualizar
    public function update()
    {
        $this->validate();
        $this->horario->dia = $this->dia;
        $this->horario->horaInicio = $this->horaInicio;
        $this->horario->horaFinal = $this->horaFinal;
        $this->horario->update();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó un horario con código: ' . $this->horario->id, auth()->user()->id]);
        $this->reset(['open_edit', 'id', 'dia', 'horaInicio', 'horaFinal']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente');
    }

    //Metodo de eliminar
    public function delete($horario)
    {
        $hora = horario::find($horario);
        $id = $horario;
        $hora->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó un horario con código: ' . $id, auth()->user()->id]);
        $this->emit('alert', 'Eliminado Correctamente');
        $this->reset();
    }

    //Actualizar Vista luego de añadir
    public function actualizar()
    {
        $this->render();
        $this->emit('alert', 'Añadido Correctamente!');
    }

    //Renderizar la pagina
    public function render()
    {
        $horarios = horario::where('dia', 'like', '%' . $this->search . '%')
            ->orWhere('id', 'like', '%' . $this->search . '%')
            ->orWhere('horaInicio', 'like', '%' . $this->search . '%')
            ->orWhere('horaFinal', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        return view('livewire.personal.horario.lw-horario', compact('horarios'));
    }
}
