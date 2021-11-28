<?php

namespace App\Http\Livewire\AreaComun;

use App\Models\reserva;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\residente;
use App\Models\areaComun;

class LwListReserva extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    protected $listeners = ['delete' => 'delete'];
    public $open_edit = false;
    public $open = false;
    public $lastCD;
    public $identify;

    public $idR;
    public $fecha;
    public $horaIni;
    public $horaFin;
    public $cantsPers;
    public $title;
    public $start;
    public $end;
    public $idResidente = '1';
    public $codigoAC = '101';

    public $nombreRes;

    protected $rules = [
        'idR' => 'required',
        'fecha' => 'required',
        'horaIni' => 'required',
        'horaFin' => 'required',
        'cantsPers' => 'required',
        'idResidente' => 'required',
        'codigoAC' => 'required',
        'title' => 'required',
        'start' => 'required',
        'end' => 'required'
    ];

    protected $messages = [
        'horaIni.required' => 'El campo hora de inicio es obligatorio.',
        'horaFin.required' => 'El campo hora de final es obligatorio.',
        'cantsPers.required' => 'El campo cantidad de personas es obligatorio.',
        'idResidente.required' => 'El campo residente es obligatorio.',
        'codigoAC.required' => 'El campo área común es obligatorio.',
    ];

    public function mount()
    {
        $this->identify = rand();
    }
    public function render()
    {
        $reservas = reserva::where('id', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        $areas = areaComun::all();
        $residentes = residente::all();
        return view('livewire.area-comun.lw-list-reserva', compact('reservas', 'areas', 'residentes'));
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

    public function openModal()
    {
        $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'cantsPers', 'codigoAC', 'idResidente', 'title', 'start', 'end', 'open']);
        $this->lastCD = reserva::latest('id')->first();
        $this->idR = $this->lastCD->id + 1;
        $this->open = true;
    }
    public function delete(reserva $reserva)
    {
        $reserva->delete();
        $this->emit('alert', 'Eliminado Correctamente');
    }
    public function save()
    {
        $this->start = $this->fecha;
        $this->end = $this->fecha;
        $this->nombreRes = residente::find($this->idResidente);
        $this->title =  $this->nombreRes->nombre;
        $this->validate();
        reserva::create([
            'id' => $this->idR,
            'fecha' => $this->fecha,
            'horaIni' => $this->horaIni,
            'horaFin' => $this->horaFin,
            'cantsPers' => $this->cantsPers,
            'title' => $this->title,
            'start' => $this->start,
            'end' => $this->end,
            'idResidente' => $this->idResidente,
            'codigoAC' => $this->codigoAC
        ]);
        $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'cantsPers', 'codigoAC', 'idResidente', 'title', 'start', 'end', 'open']);
        $this->identify = rand();
        $this->emit('alert', 'Añadido Correctamente');
    }
}
