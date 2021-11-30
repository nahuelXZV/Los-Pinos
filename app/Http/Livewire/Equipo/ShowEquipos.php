<?php

namespace App\Http\Livewire\Equipo;

use Livewire\Component;
use App\Models\equipo;
use Livewire\WithPagination;

class ShowEquipos extends Component
{
    use WithPagination;

    public $search = "";
    public $sort = 'codigo';
    public $direction = 'desc';
    public $cant = 10;
    
    public $readyToLoad = false;

    protected $listeners = ['render', 'delete'];


    protected $queryString = [
        'cant' => ['except' => '10'], 
        'sort' => ['except' => 'codigo'], 
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ]; 


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        if($this->readyToLoad){
             $equipos = equipo::where('codigo', 'like', '%' . $this->search . '%')
                            ->orWhere('nombre', 'like', '%' . $this->search . '%')
                            ->orWhere('descripcion', 'like', '%' . $this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate($this->cant);
        }else{
            $equipos = [];
        }

        return view('livewire.equipo.show-equipos', compact('equipos'));
    }

    public function loadEquipos()
    {
        $this->readyToLoad = true;
    }

    public function order($sort){

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

    public function delete(equipo $equipo)
    {
        $equipo->delete();
    }
}
