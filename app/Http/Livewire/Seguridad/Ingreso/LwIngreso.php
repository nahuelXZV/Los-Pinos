<?php

namespace App\Http\Livewire\Seguridad\Ingreso;

use App\Models\ingresoR;
use App\Models\ingresoUrb;
use App\Models\motorizado;
use App\Models\vivienda;
use Livewire\Component;
use Livewire\WithPagination;

class LwIngreso extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];
    public $open = false;
    public $identify;
    protected $rules = [
        'fecha' => 'required',
        'hora' => 'required',
        'motivo' => 'required|max:50',
    ];

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

    public function delete(ingresoUrb $ingreso)
    {
        $ingreso->delete();
        $this->emit('alert', 'Eliminado Correctamente!');
    }

    public function render()
    {
        $ingresos = ingresoUrb::where('fecha', 'like', '%' . $this->search . '%')
            ->orWhere('motivo', 'like', '%' . $this->search . '%')
            ->orWhere('idVivienda', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        $viviendas = vivienda::all();
        $motorizados = motorizado::all();
        return view('livewire.seguridad.ingreso.lw-ingreso', compact('ingresos', 'viviendas', 'motorizados'));
    }
}
