<?php

namespace App\Http\Livewire\Equipo;

use App\Models\regreso;
use App\Models\regresoEquipo;
use App\Models\equipo;
use App\Models\salidaEquipo;
use Livewire\WithPagination;


use Livewire\Component;

class ShowRegreso extends Component
{

    use WithPagination;

    public $search = '';
    public $sort = 'codigo';
    public $direction = 'asc';
    public $pagination = 10;
    protected $listeners = ['delete' => 'delete', 'mensajeEdit' => 'actualizarDatos'];
    public $open_editar = false;
    public $open_add = false;
    public $open_new = false;
    public $identify;

    public $idRegresoEquipo = 1;
    public $codigoEquipo = 1000;
    public $idRegreso, $idSalidaEquipo, $nombreEquipo, $estadoDevolucion, $fechaRegreso, 
    $horaRegreso, $stockRegresado, $stockFaltante, $equi;
   


    public function mount($regreso)
    {
        $this->identify = rand();
        $this->regreso = $regreso;
    }
    public function render()
    {

        $lista = regresoEquipo::find($this->regreso->id)->regreso()->get();
        $listaEquipo = equipo::all();
        $listaSalida = salidaEquipo::all();
        return view('livewire.equipo.show-regreso', compact('lista', 'listaEquipo', 'listaSalida'));
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function open_edit($idRegreso)
    {
        $regresado = regreso::find($idRegreso);
        $equipo = equipo::find($regresado->codigoEquipo);
        $regreso = regresoEquipo::find($regresado->idRegresoEquipo);
        $this->idRegreso = $regresado->id;
        $this->codigoEquipo = $regresado->codigoEquipo;
        $this->estadoDevolucion = $regresado->estadoDevolucion;

        $this->idSalidaEquipo = $regreso->idSalidaEquipo;
        $this->idRegresoEquipo = $regreso->id;
        $this->horaRegreso = $regreso->hora;
        $this->fechaRegreso = $regreso->fecha;
        $this->stockRegresado = $regreso->stockRegresado;
        $this->idSalidaEquipo = $regreso->idSalidaEquipo;

        $this->nombreEquipo = $equipo->nombre;
        $this->open_editar = true;
    }


    
    public function update()
    {
        $regresado = regreso::find($this->idRegreso);
        $regreso = regresoEquipo::find($regresado->idRegresoEquipo);
        $equipo = equipo::find($regresado->codigoEquipo);
        $regresado->idRegresoEquipo = $this->idRegresoEquipo;
        $regresado->codigoEquipo = $this->codigoEquipo;
        $regresado->estadoDevolucion =  $this->estadoDevolucion;

        $regreso->hora = $this->horaRegreso;
        $regreso->fecha = $this->fechaRegreso;   
        $regreso->idSalidaEquipo = $this->idSalidaEquipo;


        if($equipo->multiplicidad == 'Multiple')
        {
                $this->stockRegresado = abs($regreso->stockRegresado - $this->stockRegresado);
                $regreso->stockRegresado = $this->stockRegresado + $regreso->stockRegresado; 
                $equipo->stock = $equipo->stock + $this->stockRegresado;
                if($equipo->stockFaltante - $this->stockRegresado < 0)
                {
                    $equipo->stockFaltante = 0;
                }else{
                    $equipo->stockFaltante = $equipo->stockFaltante - $this->stockRegresado;
                }
            $regresado->estadoDevolucion =  "Buen Estado";
            $equipo->estadoFuncionamiento = "Buen Estado";
        }else{
            $regresado->estadoDevolucion =  $this->estadoDevolucion;
            $equipo->estadoFuncionamiento = $this->estadoDevolucion;
        }

        $regresado->save();
        $regreso->save();
        $equipo->save();

        $this->reset(['open_editar', 'codigoEquipo', 'idSalidaEquipo', 'estadoDevolucion', 'horaRegreso', 'fechaRegreso']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente');
    }
    

    public function delete($regresoEq)
    {
        $regresoE = regreso::find($regresoEq);
        $regresoE->delete();
        $this->emit('alert', 'Eliminado Correctamente');
    }
    public function actualizarDatos($idRegresoEquipo)
    {
        $this->regreso = equipo::find($idRegresoEquipo);
        $this->emit('alert', 'Actualizado Correctamente');
    }
    public function NewRegresado()
    {
        $this->render();
        $this->emit('alert', 'Añadido Correctamente');
    }


}
