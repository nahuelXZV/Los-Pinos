<?php

namespace App\Http\Livewire\Equipo;

use App\Models\almacen;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAlmacens extends Component
{
    use WithPagination;

    public $search = "";
    public $sort = 'id';
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
            $almacens = almacen::where('id', 'like', '%' . $this->search . '%')
                           ->orWhere('nombre', 'like', '%' . $this->search . '%')
                           ->orWhere('manzano', 'like', '%' . $this->search . '%')
                           ->orderBy($this->sort, $this->direction)
                           ->paginate($this->cant);
       }else{
           $almacens = [];
       }

        return view('livewire.equipo.show-almacens', compact('almacens'));
    }

    public function loadAlmacens()
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

    public function delete(almacen $almacen)
    {
        $almacen->delete();
    }
    
}
