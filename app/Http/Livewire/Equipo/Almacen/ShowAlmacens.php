<?php

namespace App\Http\Livewire\Equipo\Almacen;

use App\Models\almacen;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAlmacens extends Component
{
    use WithPagination;

    //Atributos de la vista
    public $search = "";
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 10;

    //Atributo de la vista para verificar la carga de la página
    public $readyToLoad = false;

    //Listener que manda el equipo al metodo delete de otra vista
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

    //Método para renderizar la vista
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

        return view('livewire.equipo.almacen.show-almacens', compact('almacens'));
    }

    //Método para verificar la carga de la página
    public function loadAlmacens()
    {
        $this->readyToLoad = true;
    }

    //Método para ordenar
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

    //Método para borrar
    public function delete(almacen $almacen)
    {
        $almacen->delete();
    }
    
}
