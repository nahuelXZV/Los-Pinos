<?php

namespace App\Http\Livewire\AreaComun;

use App\Models\reporteAc;
use App\Models\reserva;
use Livewire\Component;

class LwReporte extends Component
{
    public $open_rep = false;
    public $open_edit = false;
    public $existReporte = false;
    public $identify;
    public $descripcion;
    public $idR;
    public $reserva;
    public $editRep;
    protected $listeners = ['delete' => 'delete'];

    protected $rules = [
        'descripcion' => 'required',
    ];

    protected $messages = [
        'descripcion.required' => 'El campo descripción es obligatorio.'
    ];
    public function mount($reserva)
    {
        $this->identify = rand();
        $this->reserva = reserva::find($reserva);
    }

    public function render()
    {
        $reportes = reporteAc::where('codigoRes', '=', $this->reserva->id)->get();
        return view('livewire.area-comun.lw-reporte', compact('reportes'));
    }

    public function edit($idReporte)
    {
        $this->editRep = reporteAc::find($idReporte);
        $this->descripcion = $this->editRep->reporte;
        $this->idR = $idReporte;
        $this->open_edit = true;
    }
    public function save()
    {
        $this->validate();
        reporteAc::create([
            'reporte' => $this->descripcion,
            'codigoRes' => $this->reserva->id,
            'codigoAC' => $this->reserva->codigoAC
        ]);
        $this->reset(['descripcion', 'open_rep']);
        $this->identify = rand();
        $this->emit('alert', 'Añadido Correctamente');
    }
    public function update()
    {
        $this->validate();
        $this->editRep->reporte = $this->descripcion;
        $this->editRep->save();
        $this->reset(['idR', 'descripcion', 'editRep', 'open_edit']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente');
    }

    public function delete(reporteAc $reported)
    {
        $reported->delete();
        $this->emit('alert', 'Eliminado Correctamente');
    }
}
