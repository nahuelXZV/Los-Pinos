<?php

namespace App\Http\Livewire\Seguridad\Salida;

use App\Models\bitacora;
use App\Models\residente;
use App\Models\salidaR;
use App\Models\salidaUrb;
use App\Models\salidaV;
use App\Models\visitante;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LwListaPersona extends Component
{
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    public $open_V = false;
    public $open_R = false;
    public $identify;
    protected $listeners = ['deleteV' => 'deleteV', 'deleteR' => 'deleteR'];

    public $idResidente;
    public $idVisitante;
    public $salida;

    public function mount(salidaUrb $salida)
    {
        $this->identify = rand();
        $this->salida = $salida;
        $r = residente::all()->first();
        $v = visitante::all()->first();
        $this->idResidente = $r->id;
        $this->idVisitante = $v->id;
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
    public function saveV()
    {
        $contador = DB::table('salida_v_s')->where('idVisitante', '=', $this->idVisitante)
            ->where('idSalidaUrb', '=', $this->salida->id)->count();
        if ($contador > 0) {
            $this->reset(['open_V']);
            $this->emit('alert', 'Ya se esta registrada');
        } else {
            salidaV::create([
                'idVisitante' => $this->idVisitante,
                'idSalidaUrb' => $this->salida->id
            ]);
            $bitacora = new bitacora();
            $bitacora->crear('Añadió un visitante a la salida con código: ' . $this->salida->id);
            $this->reset(['open_V']);
            $this->emit('alert', 'Añadido Correctamente!');
        }
    }
    public function saveRe()
    {
        $contador = DB::table('salida_r_s')->where('idResidente', '=', $this->idResidente)
            ->where('idSalidaUrb', '=', $this->salida->id)->count();
        if ($contador > 0) {
            $this->reset(['open_R']);
            $this->emit('alert', 'Ya se esta registrada');
        } else {
            salidaR::create([
                'idResidente' => $this->idResidente,
                'idSalidaUrb' => $this->salida->id
            ]);
            $bitacora = new bitacora();
            $bitacora->crear('Añadió un residente a la salida con código: ' . $this->salida->id);
            $this->reset(['open_R']);
            $this->emit('alert', 'Añadido Correctamente!');
        }
    }

    public function deleteV($ingresoV)
    {
        $delet = salidaV::find($ingresoV);
        $delet->delete();
        $bitacora = new bitacora();
        $bitacora->crear('Eliminó un visitante a la salida con código: ' .  $this->salida->id);
        $this->emit('actualizar');
    }
    public function deleteR($ingresoR)
    {
        $delet = salidaR::find($ingresoR);
        $delet->delete();
        $bitacora = new bitacora();
        $bitacora->crear('Eliminó un residente a la salida con código: ' .  $this->salida->id);
        $this->emit('actualizar');
    }

    public function render()
    {
        $listaV = visitante::all();
        $listaR = residente::all();
        $listaResidentes = salidaUrb::find($this->salida->id)->salidaR()
            ->orderBy($this->sort, $this->direction)->get();
        $listaVisitantes = salidaUrb::find($this->salida->id)->salidaV()
            ->orderBy($this->sort, $this->direction)->get();
        return view('livewire.seguridad.salida.lw-lista-persona', compact('listaV', 'listaR', 'listaResidentes', 'listaVisitantes'));
    }
}
