<?php

namespace App\Http\Livewire\Equipo;

use App\Models\equipo;
use App\Models\personal;
use App\Models\regresoEquipo;
use App\Models\salidaEquipo;
use Livewire\Component;
use Livewire\WithPagination;

class ShowRegresoEquipos extends Component
{

    use WithPagination;

    public $search = "";
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 10;

    public $open = false;

    public $readyToLoad = false;
    public $identify;

    public $fecha, $hora, $motivo, $idSalidaEquipo, $personalN, $estadoSalida, $idS, $lastSE;
    public $codigoPersonal = '100';
    public $nombre;

    protected $listeners = ['render', 'delete'];

    protected $rules = [
        'codigoPersonal' => 'required',
        'fecha' => 'required',
        'hora' => 'required',
        'motivo' => 'required',
        'idSalidaEquipo' => 'required'
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
            $regresos = regresoEquipo::where('id', 'like', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->paginate($this->cant);
            $salidas = salidaEquipo::all();
            $personals = personal::all();
       }else{
           $personals = [];
           $regresos = [];
           $salidas= [];
       }
        return view('livewire.equipo.show-regreso-equipos', compact('regresos', 'salidas', 'personals'));
    }
    public function loadRegresos()
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
        $this->reset(['fecha', 'hora', 'motivo', 'codigoPersonal', 'idSalidaEquipo', 'open']);
        
        $this->open = true;
    }

    public function delete(regresoEquipo $regreso)
    {
        $regreso->delete();
    }

    public function save()
    {
        $this->validate();
     
        regresoEquipo::create([
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'motivo' => $this->motivo,
            'idSalidaEquipo' => $this->idSalidaEquipo,
            'codigoPersonal' => $this->codigoPersonal
        ]);
        $this->reset(['fecha', 'hora', 'motivo', 'codigoPersonal', 'idSalidaEquipo', 'open']);
        $this->identify = rand();
        $this->emit('alert', 'Añadido Correctamente');
    }
    
}
