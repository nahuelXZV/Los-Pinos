<?php

namespace App\Http\Livewire\Personal\Trabajo;

use App\Models\seccion;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\trabajo;
use Illuminate\Support\Facades\DB;

class LwTrabajos extends Component
{
    use WithPagination;

    //Atributos de vista 
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    public $open_edit = false;
    public $identify;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];

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
        $this->trabajo = new trabajo();
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
    public function open_modal_edit(trabajo $trabajo)
    {
        $this->reset(['open_edit','id', 'actividad', 'idSeccion']);
        $this->trabajo = $trabajo;
        $this->idT = $this->trabajo->id;
        $this->actividad = $this->trabajo->actividad;
        $this->idSeccion = $this->trabajo->idSeccion;
        $this->open_edit = true;
    }

    //Metodo de actualizar
    public function update()
    {
        $this->validate();
        $this->trabajo->actividad = $this->actividad;
        //$this->trabajo->idT = $this->id;
        $this->trabajo->idSeccion = $this->idSeccion;
        $this->trabajo->update();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó el trabajo : ' . $this->trabajo->actividad, auth()->user()->id]);
        $this->reset(['open_edit','id', 'actividad', 'idSeccion']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente');
    }

    //Metodo de eliminar
    public function delete(trabajo $trabajo)
    {
        $idT = $trabajo->id;
        $trabajo->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó el trabajo con código : ' . $idT , auth()->user()->id]);
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
        $trabajos = trabajo::where('actividad', 'like', '%' . $this->search . '%')
            ->orWhere('id', 'like', '%' . $this->search . '%')
            ->orWhere('actividad', 'like', '%' . $this->search . '%')
            ->orWhere('idSeccion', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);

        $secciones = seccion::all();
        return view('livewire.personal.trabajo.lw-trabajos', compact('trabajos','secciones'));
        
    }

}
