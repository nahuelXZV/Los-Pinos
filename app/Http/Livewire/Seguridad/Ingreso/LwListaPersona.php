<?php

namespace App\Http\Livewire\Seguridad\Ingreso;

use App\Models\ingresoR;
use App\Models\ingresoUrb;
use App\Models\ingresoV;
use App\Models\residente;
use App\Models\visitante;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

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

    public $idResidente = null;
    public $idVisitante = null;


    public function mount(ingresoUrb $ingreso)
    {
        $this->identify = rand();
        $this->ingreso = $ingreso;
        $r = residente::all()->first();
        $v = visitante::all()->first();
        $this->idVisitante = $r->id;
        $this->idResidente = $v->id;
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
        $contador = DB::table('ingreso_v_s')->where('idVisitante', '=', $this->idVisitante)
            ->where('idIngresoUrb', '=', $this->ingreso->id)->count();
        if ($contador > 0) {
            $this->reset(['open_V']);
            $this->emit('alert', 'Ya se esta registrada');
        } else {
            ingresoV::create([
                'idVisitante' => $this->idVisitante,
                'idIngresoUrb' => $this->ingreso->id
            ]);
            $this->reset(['open_V']);
            $this->emit('alert', 'Añadido Correctamente!');
        }
    }
    public function saveR()
    {
        $contador = DB::table('ingreso_r_s')->where('idResidente', '=', $this->idResidente)
            ->where('idIngresoUrb', '=', $this->ingreso->id)->count();
        if ($contador > 0) {
            $this->reset(['open_R']);
            $this->emit('alert', 'Ya se esta registrada');
        } else {
            ingresoR::create([
                'idResidente' => $this->idResidente,
                'idIngresoUrb' => $this->ingreso->id
            ]);
            $this->reset(['open_R']);
            $this->emit('alert', 'Añadido Correctamente!');
        }
    }

    public function deleteV($ingresoV)
    {
        $delet = ingresoR::find($ingresoV);
        $delet->delete();
        $this->emit('actualizar');
    }
    public function deleteR($ingresoR)
    {
        $delet = ingresoV::find($ingresoR);
        $delet->delete();
        $this->emit('actualizar');
    }

    public function render()
    {
        $listaV = visitante::all();
        $listaR = residente::all();
        $listaResidentes = ingresoUrb::find($this->ingreso->id)->ingresoV()
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)->get();
        $listaVisitantes = ingresoUrb::find($this->ingreso->id)->ingresoR()
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)->get();
        return view('livewire.seguridad.ingreso.lw-lista-persona', compact('listaResidentes', 'listaVisitantes', 'listaV', 'listaR'));
    }
}
