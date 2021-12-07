<?php

namespace App\Http\Livewire\Equipo\Almacen;

use App\Models\almacen;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ShowAlmacens extends Component
{
    use WithPagination;

    //Atributos de la vista
    public $search = "";
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 10;

    //Listener que manda el almacen al metodo delete de otra vista
    protected $listeners = ['render', 'delete'];

    //Arreglo para acortar link de la página en casos especificos
    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'codigo'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];

    //Metodo de reinicio de buscador
    public function updatingSearch()
    {
        $this->resetPage();
    }

    //Método para ordenar
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

    //Método para borrar
    public function delete(almacen $almacen)
    {
        $a = almacen::find($almacen->id);
        $almacen->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó el almacén: ' . $a->nombre . ' con ID: ' . $a->id, auth()->user()->id]);
        $this->emit('alert', 'Eliminado Correctamente');
    }

    //Método para renderizar la vista
    public function render()
    {
        $almacens = almacen::where('id', 'like', '%' . $this->search . '%')
            ->orWhere('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('manzano', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);

        return view('livewire.equipo.almacen.show-almacens', compact('almacens'));
    }
}
