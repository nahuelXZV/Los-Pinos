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

    public $fecha, $hora, $motivo, $personalN, $estadoSalida, $stockTotal, $validatedData,
    $stockRequerido, $stockFaltante, $idSalidaEquipo, $lastS, $multiplicidad;
    public $codigoPersonal = '100';
    public $codigoEquipo = '1000';

    protected $listeners = ['render', 'delete'];

    protected $rules = [
        'codigoPersonal' => 'required',
        'codigoEquipo' => 'required',
        'stockRequerido' => 'max:10',
        'fecha' => 'required',
        'hora' => 'required',
        'motivo' => 'required'
    ];

    protected $messages = [
        'stockRequerido.max' => 'El stock requerido no puede ser mayor al stock actual.',
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
        $equipo = equipo::find($this->codigoEquipo);
        $this->stockTotal = $equipo->stock;
        $this->reset(['fecha', 'hora', 'motivo', 'codigoPersonal', 'codigoEquipo', 'stockRequerido', 'open']);
        $this->open = true;
    }

    public function delete(salidaEquipo $salida)
    {
        $salida->delete();
    }

    public function save()
    {
        
        $this->lastS = salidaEquipo::latest('id')->first();
        $this->idSalidaEquipo = $this->lastS->id + 1;
        $equipo = equipo::find($this->codigoEquipo);
        if($equipo->multiplicidad == 'Unico')
        {
            $equipo->stock = null;
            $equipo->stockFaltante = null;
            $this->stockRequerido = null;
            $this->estadoSalida = $equipo->estadoFuncionamiento;
        }
        else{

            if($this->stockRequerido > $equipo->stock)
            {
               $this->stockRequerido = $equipo->stock;
               $equipo->stock = 0;
            }else{
                $equipo->stock = $equipo->stock - $this->stockRequerido;
                
            }
            $equipo->stockFaltante = $equipo->stockFaltante + $this->stockRequerido;
            $this->estadoSalida = 'Buen Estado';
        }
        salidaEquipo::create([
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'motivo' => $this->motivo,
            'stockRequerido' => $this->stockRequerido,
            'codigoPersonal' => $this->codigoPersonal
        ]);
        saco::create([
            'idSalidaEquipo' => $this->idSalidaEquipo,
            'codigoEquipo' => $this->codigoEquipo,
            'estadoSalida' => $this->estadoSalida
        ]);
        $equipo->save();
        $this->reset(['fecha', 'hora', 'motivo', 'codigoPersonal', 'codigoEquipo', 'stockRequerido', 'open']);
        $this->identify = rand();
        $this->emit('alert', 'Añadido Correctamente');
    }

}
