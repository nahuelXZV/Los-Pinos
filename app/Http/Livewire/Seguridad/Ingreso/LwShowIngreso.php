<?php

namespace App\Http\Livewire\Seguridad\Ingreso;

use App\Models\ingresoR;
use App\Models\ingresoUrb;
use App\Models\ingresoV;
use App\Models\motorizado;
use App\Models\residente;
use App\Models\visitante;
use App\Models\vivienda;
use Livewire\Component;
use Livewire\WithPagination;

class LwShowIngreso extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    protected $listeners = ['actualizar' => 'actualizar'];
    public $open = false;
    public $identify;

    public $ingreso;

    public $fecha;
    public $hora;
    public $motivo;
    public $idVivienda = null;
    public $idMotorizado = null;
    public $idPersona = null;

    protected $rules = [
        'fecha' => 'required',
        'hora' => 'required',
        'motivo' => 'required|max:50',
    ];

    public function mount(ingresoUrb $ingreso)
    {
        $this->identify = rand();
        $this->ingreso = $ingreso;
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

    public function actualizar()
    {
        $this->render();
        $this->emit('alert', 'Añadido Correctamente!');
    }

    public function datos($idIngreso)
    {
        $this->ingreso = ingresoUrb::find($idIngreso);
        $this->fecha = $this->ingreso->fecha;
        $this->hora = $this->ingreso->hora;
        $this->motivo = $this->ingreso->motivo;
        $this->idVivienda = $this->ingreso->idVivienda;
        $this->idMotorizado = $this->ingreso->idMotorizado;
        $this->open = true;
    }

    public function update()
    {
        $this->validate();
        $this->ingreso->fecha = $this->fecha;
        $this->ingreso->hora = $this->hora;
        $this->ingreso->motivo = $this->motivo;
        $this->ingreso->idVivienda = $this->idVivienda;
        $this->ingreso->idMotorizado = $this->idMotorizado;
        $this->ingreso->save();
        $this->reset(['open', 'fecha', 'hora', 'motivo', 'idVivienda', 'idMotorizado']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }

    public function render()
    {
        $viviendas = vivienda::all();
        $motorizados = motorizado::all();
        return view('livewire.seguridad.ingreso.lw-show-ingreso', compact('motorizados', 'viviendas'));
    }
}
