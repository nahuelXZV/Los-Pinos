<?php

namespace App\Http\Livewire\Sistema;

use Livewire\Component;
use App\Models\bitacora;
use Livewire\WithPagination;

class LwBitacora extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];
    public $open = false;
    public $identify;

    protected $rules = [];

    protected $messages = [];
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
    public function datos($idVivienda)
    {

        $this->open = true;
    }
    public function update()
    {
        $this->reset(['open', 'nroCasa', 'calle', 'manzano', 'lote', 'estadoDeResidencia', 'estadoDeVivienda']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }
    public function delete(bitacora $bitacora)
    {
        $bitacora->delete();
        $this->emit('alert', 'Eliminado Correctamente!');
    }
    public function render()
    {
        $bitacoras = bitacora::where('id', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        return view('livewire.sistema.lw-bitacora', compact('bitacoras'));
    }
}
