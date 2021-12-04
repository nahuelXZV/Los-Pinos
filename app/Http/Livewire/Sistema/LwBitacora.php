<?php

namespace App\Http\Livewire\Sistema;

use Livewire\Component;
use App\Models\bitacora;
use Livewire\WithPagination;

class LwBitacora extends Component
{
    use WithPagination;

    //Atributos de la vista
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    public $identify;
    public $buscador = 'accion';
    
    //Iniciador
    public function mount()
    {
        $this->identify = rand();
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

    //Metodo de renderizado
    public function render()
    {

        $bitacoras = bitacora::where($this->buscador, 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        return view('livewire.sistema.lw-bitacora', compact('bitacoras'));
    }
}
