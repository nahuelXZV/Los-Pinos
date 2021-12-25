<?php

namespace App\Http\Livewire\Seguridad\Salida;

use App\Models\bitacora;
use App\Models\salidaUrb;
use Livewire\Component;
use Livewire\WithPagination;

class LwSalida extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];
    public $open = false;
    public $identify;

    public function mount()
    {
        $this->identify = rand();
    }

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
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function actualizar()
    {
        $this->emit('alert', 'Añadido Correctamente!');
        $this->render();
    }

    public function delete(salidaUrb $salida)
    {
        $iding = $salida->id;
        $salida->delete();
        $bitacora = new bitacora();
        $bitacora->crear('Eliminó una salida con código: ' . $iding);
        $this->emit('alert', 'Eliminado Correctamente!');
    }

    public function render()
    {
        $salidas = salidaUrb::where('fecha', 'like', '%' . $this->search . '%')
            ->orWhere('idMotorizado', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        return view('livewire.seguridad.salida.lw-salida', compact('salidas'));
    }
}
