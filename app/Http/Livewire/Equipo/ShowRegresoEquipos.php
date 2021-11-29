<?php

namespace App\Http\Livewire\Equipo;

use App\Models\equipo;
use App\Models\personal;
use App\Models\regreso;
use App\Models\regresoEquipo;
use App\Models\saco;
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

    public $hora, $fecha, $idRegresoEquipo, $idSalidaEquipo,
    $lastR, $idR, $estadoDevolucion, $stockTotal, $stockRegresado;
    public $codigoPersonal = '100';
    public $codigoEquipo = '1000';

    protected $listeners = ['render', 'delete'];

    protected $rules = [
        'codigoPersonal' => 'required',
        'codigoEquipo' => 'required',
        'stockRequerido' => 'max:10',
        'fecha' => 'required',
        'hora' => 'required',
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
            $equipos = equipo::all();
            $personals = personal::all();
       }else{
           $personals = [];
           $salidas = [];
           $regresos = [];
           $equipos= [];
       }

        return view('livewire.equipo.show-regreso-equipos', compact('regresos', 'salidas', 'equipos', 'personals'));
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
        $this->lastR = regresoEquipo::find('id')->last();
        $this->idR = $this->lastR->id + 1;
        $this->reset(['fecha', 'hora', 'codigoPersonal', 'codigoEquipo', 'estadoDevolucion', 'stockRegresado', 'open']);
        $this->open = true;
    }

    public function delete(regresoEquipo $regreso)
    {
        $regreso->delete();
    }

    public function save()
    {
        
        $this->lastR = regresoEquipo::latest('id')->first();
        $this->idRegresoEquipo = $this->lastR->id + 1;
        $equipo = equipo::find($this->codigoEquipo);
        if($equipo->multiplicidad == 'Unico')
        {
            $equipo->stock = null;
            $equipo->stockFaltante = null;
            $equipo->estadoFuncionamiento = $this->estadoDevolucion;
            $this->stockRegresado = null;
        }
        else{

            $equipo->stock = $equipo->stock + $this->stockRegresado;
            if($equipo->stockFaltante - $this->stockRegresado <= 0){
                $equipo->stockFaltante = 0;
            
            }else{
                $equipo->stockFaltante = $equipo->stockFaltante - $this->stockRegresado; 
            }
                $this->estadoDevolucion = 'Buen Estado';
        }
            regresoEquipo::create([
                'fecha' => $this->fecha,
                'hora' => $this->hora,
                'stockRegresado' => $this->stockRegresado,
                'idSalidaEquipo' => $this->idSalidaEquipo,
                'codigoPersonal' => $this->codigoPersonal
            ]);
            regreso::create([
                'idRegresoEquipo' => $this->idRegresoEquipo,
                'codigoEquipo' => $this->codigoEquipo,
                'estadoDevolucion' => $this->estadoDevolucion
            ]);
            $equipo->save();
            $this->emit('alert', 'Añadido Correctamente');
        $this->reset(['fecha', 'hora', 'codigoPersonal', 'codigoEquipo', 'stockRegresado', 'estadoDevolucion', 'open']);
        $this->identify = rand();
    }
    

    
    
    
}
