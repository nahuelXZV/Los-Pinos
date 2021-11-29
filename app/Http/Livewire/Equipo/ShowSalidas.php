<?php

namespace App\Http\Livewire\Equipo;

use App\Models\equipo;
use App\Models\salidaEquipo;
use App\Models\saco;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ShowSalidas extends Component
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

    public $idSalidaEquipo = 1;
    public $codigoEquipo = 1000;
    public $nombreEquipo;
    public $estadoSalida;
    public $fechaSalida;
    public $horaSalida;
    public $stockRequerido;
    public $stockFaltante;
    public $salida;
    public $idSaco;
    public $salidaE;


    public function mount($salida)
    {
        $this->identify = rand();
        $this->salida = $salida;
    }

    public function render()
    { 
        $lista = salidaEquipo::find($this->salida->id)->saco()->get();
        $listaEquipo = equipo::all();
        return view('livewire.equipo.show-salidas' , compact('lista', 'listaEquipo'));
    }

    public function order($sort)
    {
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
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function open_edit($idSaco)
    {
        $saco = saco::find($idSaco);
        $equipo = equipo::find($saco->codigoEquipo);
        $salio = salidaEquipo::find($saco->idSalidaEquipo);
        $this->idSaco = $saco->id;
        $this->estadoSalida = $saco->estadoSalida;
        $this->codigoEquipo = $saco->codigoEquipo;
        $this->nombreEquipo = $equipo->nombre;
        $this->idSalidaEquipo = $salio->id;
        $this->horaSalida = $salio->hora;
        $this->fechaSalida = $salio->fecha;
        $this->stockRequerido = $salio->stockRequerido;
        $this->open_editar = true;
    }

    public function update()
    {
        $saco = saco::find($this->idSaco);
        $salio = salidaEquipo::find($saco->idSalidaEquipo);
        $equipo = equipo::find($saco->codigoEquipo);
        $saco->idSalidaEquipo = $this->idSalidaEquipo;
        $saco->codigoEquipo = $this->codigoEquipo;
        $salio->hora = $this->horaSalida;
        $salio->fecha = $this->fechaSalida;
        if($this->stockRequerido > 0)
        {   
            if($equipo->stock == 0)
            {
                $this->stockRequerido = 0;
            }else{
                if($this->stockRequerido >= $equipo->stock)
                {
                    $this->stockRequerido = $salio->stockRequerido + $equipo->stock;
                    $salio->stockRequerido = $this->stockRequerido;
                    $equipo->stockFaltante = $this->stockRequerido;
                    $equipo->stock = 0;
                }else{
                    $this->stockRequerido = $this->stockRequerido - $salio->stockRequerido; 
                    $salio->stockRequerido = $salio->stockRequerido + $this->stockRequerido;
                    $equipo->stock = $equipo->stock - $this->stockRequerido;
                    $equipo->stockFaltante = $equipo->stockFaltante + $this->stockRequerido;
                }
            }

            if($equipo->multiplicidad == 'Unico')
            {
                $saco->estadoSalida =  $this->estadoSalida;
                $equipo->estadoFuncionamiento = $this->estadoSalida;
            }else
            {
                $equipo->estadoFuncionamiento = 'Buen Estado';
                $saco->estadoSalida = 'Buen Estado';
            }
            
        }
        $saco->save();
        $salio->save();
        $equipo->save();
        $this->reset(['open_editar', 'codigoEquipo', 'idSalidaEquipo', 'estadoSalida', 'horaSalida', 'fechaSalida']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente');
    }

    public function save()
    {
        $this->validate();
        $contador = DB::table('sacos')->where('idSalidaEquipo', '=', $this->salida->id)
            ->where('codigoEquipo', '=', $this->codigoEquipo)->count();
        if ($contador > 0) {
            $this->reset(['open_add', 'codigoEquipo', 'idSalidaEquipo', 'estadoSalida', 'horaSalida', 'fechaSalida']);
            $this->identify = rand();
            $this->emit('alert', 'Ya se registró la Salida');
        } else {
            saco::create([
                'idSalidaEquipo' => $this->salida->id,
                'codigoEquipo' => $this->codigoEquipo,
                'estadoSalida' => $this->estadoSalida
            ]);
            $this->reset(['open_add', 'codigoEquipo', 'idSalidaEquipo', 'estadoSalida', 'horaSalida', 'fechaSalida']);
            $this->identify = rand();
            $this->emit('alert', 'Añadido Correctamente');
        }
    }

    public function delete($sacoEq)
    {
        $sacoE = saco::find($sacoEq);
        $sacoE->delete();
        $this->emit('alert', 'Eliminado Correctamente');
    }
    public function actualizarDatos($idSalidaEquipo)
    {
        $this->salida = equipo::find($idSalidaEquipo);
        $this->emit('alert', 'Actualizado Correctamente');
    }
    public function NewSaco()
    {
        $this->render();
        $this->emit('alert', 'Añadido Correctamente');
    }
    
}
