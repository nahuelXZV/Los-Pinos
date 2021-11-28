<?php

namespace App\Http\Livewire\AreaComun;

use App\Models\reserva;
use Livewire\Component;
use Illuminate\Support\Carbon;

class LwEditarReserva extends Component
{
    public $open_edit = false;
    public $reserva;
    public $identify;

    public $idR;
    public $fecha;
    public $horaIni;
    public $horaFin;
    public $cantsPers;
    public $title;
    public $start;
    public $end;
    public $idResidente;
    public $codigoAC;
    protected $listeners = ['delete' => 'delete'];

    protected $rules = [
        'idR' => 'required',
        'fecha' => 'required',
        'horaIni' => 'required',
        'horaFin' => 'required',
        'cantsPers' => 'required',
        'idResidente' => 'required',
        'codigoAC' => 'required',
    ];

    protected $messages = [
        'horaIni.required' => 'El campo hora de inicio es obligatorio.',
        'horaFin.required' => 'El campo hora de final es obligatorio.',
        'cantsPers.required' => 'El campo cantidad de personas es obligatorio.',
        'idResidente.required' => 'El campo residente es obligatorio.',
        'codigoAC.required' => 'El campo área común es obligatorio.',
    ];
    public function mount($reserva)
    {
        $this->reserva = reserva::find($reserva);
        $this->identify = rand();
    }
    public function render()
    {
        return view('livewire.area-comun.lw-editar-reserva');
    }

    public function openModal()
    {
        $this->idR = $this->reserva->id;
        $this->fecha = $this->reserva->fecha;
        $this->horaIni = $this->reserva->horaIni;
        $this->horaFin = $this->reserva->horaFin;
        $this->cantsPers = $this->reserva->cantsPers;
        $this->idResidente = $this->reserva->idResidente;
        $this->codigoAC = $this->reserva->codigoAC;
        $this->Nresidente = $this->reserva->Vresidente->nombre;
        $this->open_edit = true;
    }
    public function update()
    {
        $this->validate();
        $this->reserva->fecha = $this->fecha;
        $this->reserva->horaIni = $this->horaIni;
        $this->reserva->horaFin = $this->horaFin;
        $this->reserva->cantsPers = $this->cantsPers;
        $this->reserva->idResidente = $this->idResidente;
        $this->reserva->codigoAC = $this->codigoAC;
        $this->reserva->title = $this->Nresidente;
        $this->reserva->start = $this->fecha;
        $this->reserva->end = $this->fecha;
        $this->reserva->save();
        $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'cantsPers', 'codigoAC', 'idResidente', 'title', 'start', 'end', 'open_edit']);
        $this->identify = rand();
        $this->emit('mensajeEdit', $this->reserva->id);
    }
}
