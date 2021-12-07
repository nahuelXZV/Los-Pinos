<?php

namespace App\Http\Livewire\AreaComun\AreaComun;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\areaComun;
use Illuminate\Support\Facades\DB;

class LwAreaComun extends Component
{
    use WithPagination;

    //Atributos de vista 
    public $search = '';
    public $sort = 'codigo';
    public $direction = 'desc';
    public $pagination = 10;
    public $open_edit = false;
    public $identify;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];

    //Atributos de la clase
    public $area;
    public $codigo;
    public $nombre;
    public $calle;
    public $manzano;
    public $estadoRes = "Reservación";

    //Validaciones del formulario
    protected $rules = [
        'nombre' => 'required',
        'calle' => 'required',
        'manzano' => 'required|int|min:1',
        'estadoRes' => 'required',
    ];

    //Mensajes de Validaciones
    protected $messages = [
        'nombre.required' => 'El campo nombre de área común es obligatorio.',
        'calle.required' => 'El campo calle es obligatorio.',
        'manzano.required' => 'El campo manzano es obligatorio.',
        'manzano.min' => 'El campo manzano debe ser mayor que 0.',
        'estadoRes.required' => 'El campo estado de reserva es obligatorio.',
    ];

    //Iniciador
    public function mount()
    {
        $this->identify = rand();
        $this->area = new areaComun();
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
    public function open_modal_edit(areaComun $area)
    {
        $this->reset(['open_edit', 'codigo', 'nombre', 'calle', 'manzano', 'estadoRes', 'area']);
        $this->area = $area;
        $this->codigo = $this->area->codigo;
        $this->nombre = $this->area->nombre;
        $this->calle = $this->area->calle;
        $this->manzano = $this->area->manzano;
        $this->estadoRes = $this->area->estadoRes;
        $this->open_edit = true;
    }

    //Metodo de actualizar
    public function update()
    {
        $this->validate();
        $this->area->nombre = $this->nombre;
        $this->area->calle = $this->calle;
        $this->area->manzano = $this->manzano;
        $this->area->estadoRes = $this->estadoRes;
        $this->area->update();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó una área común con código: ' . $this->area->codigo, auth()->user()->id]);
        $this->reset(['open_edit', 'codigo', 'nombre', 'calle', 'manzano', 'estadoRes', 'area']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente');
    }

    //Metodo de eliminar
    public function delete(areaComun $area)
    {
        $codigo = $area->codigo;
        $area->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó una área común con código: ' . $codigo, auth()->user()->id]);
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
        $areas = areaComun::where('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('codigo', 'like', '%' . $this->search . '%')
            ->orWhere('calle', 'like', '%' . $this->search . '%')
            ->orWhere('manzano', 'like', '%' . $this->search . '%')
            ->orWhere('estadoRes', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        return view('livewire.area-comun.area-comun.lw-area-comun', compact('areas'));
    }
}
