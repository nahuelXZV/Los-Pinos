<?php

namespace App\Http\Livewire\Personal;

use Livewire\Component;
use App\Models\personal;
use Livewire\WithPagination;


class ShowPersonal extends Component
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
            $personal = personal::where('codigo', 'like', '%' . $this->search . '%')
                           ->orWhere('nombre', 'like', '%' . $this->search . '%')
                           ->orWhere('carnet', 'like', '%' . $this->search . '%')
                           ->orderBy($this->sort, $this->direction)
                           ->paginate($this->cant);
       }else{
           $personal = [];
       }

        return view('livewire.personal.show-personal', compact('personal'));
    }

    public function loadPersonal()
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

    public function openModal()
    {
        $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'cantsPers', 'codigoAC', 'idResidente', 'title', 'start', 'end', 'open']);
        $this->lastCD = reserva::latest('id')->first();
        $this->idR = $this->lastCD->id + 1;
        $this->open = true;
    }

    public function delete(personal $personal)
    {
        $personal->delete();
    }

}
