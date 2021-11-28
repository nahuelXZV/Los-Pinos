<?php

namespace App\Http\Livewire\Equipo;

use App\Models\equipo;
use App\Models\personal;
use App\Models\saco;
use App\Models\salidaEquipo;
use Livewire\WithPagination;
use Livewire\Component;

class ShowSalidaEquipos extends Component
{

    use WithPagination;

    public $search = "";
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 10;

    public $open = false;

    public $readyToLoad = false;
    public $identify;

    public $fecha, $hora, $motivo, $personalN, $estadoSalida, $idS, $lastSE;
    public $codigoPersonal = '100';

    protected $listeners = ['render', 'delete'];

    protected $rules = [
        'codigoPersonal' => 'required',
        'fecha' => 'required',
        'hora' => 'required',
        'motivo' => 'required'
    ];

    public function mount()
    {
        $this->identify = rand();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if($this->readyToLoad){
            $salidas = salidaEquipo::where('id', 'like', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->paginate($this->cant);
            $equipos = equipo::all();
            $personals = personal::all();
       }else{
           $personals = [];
           $salidas = [];
           $equipos= [];
       }

        return view('livewire.equipo.show-salida-equipos', compact('salidas', 'equipos', 'personals'));
    }

    public function loadSalidas()
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
        $this->reset(['fecha', 'hora', 'motivo', 'codigoPersonal','open']);
        
        $this->open = true;
    }

    public function delete(salidaEquipo $salida)
    {
        $salida->delete();
    }

    public function save()
    {
        //$this->start = $this->fecha;
        //$this->end = $this->fecha;
        $this->validate();
        salidaEquipo::create([
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'motivo' => $this->motivo,
            'codigoPersonal' => $this->codigoPersonal
        ]);
        $this->reset(['fecha', 'hora', 'motivo', 'codigoPersonal', 'open']);
        $this->identify = rand();
        $this->emit('alert', 'Añadido Correctamente');
    }

}
