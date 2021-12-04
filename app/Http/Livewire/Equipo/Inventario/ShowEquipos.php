<?php

namespace App\Http\Livewire\Equipo\Inventario;

use Livewire\Component;
use App\Models\equipo;
use Livewire\WithPagination;

class ShowEquipos extends Component
{
    use WithPagination;

    //Atributos de la vista
    public $search = "";
    public $sort = 'codigo';
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
             $equipos = equipo::where('codigo', 'like', '%' . $this->search . '%')
                            ->orWhere('nombre', 'like', '%' . $this->search . '%')
                            ->orWhere('descripcion', 'like', '%' . $this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate($this->cant);
        }else{
            $equipos = [];
        }

        return view('livewire.equipo.inventario.show-equipos', compact('equipos'));
    }

    //Método para verificar la carga de la página
    public function loadEquipos()
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
    public function delete(equipo $equipo)
    {
        $equipo->delete();
    }
}
