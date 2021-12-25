<?php

namespace App\Http\Livewire\Seguridad\Salida;

use App\Models\bitacora;
use App\Models\motorizado;
use App\Models\salidaUrb;
use Livewire\Component;
use Livewire\WithPagination;

class LwShowSalida extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    protected $listeners = ['actualizar' => 'actualizar'];
    public $open = false;
    public $identify;

    public $salida;

    public $fecha;
    public $hora;
    public $idMotorizado;
    public $idPersona = null;

    protected $rules = [
        'fecha' => 'required',
        'hora' => 'required',
    ];

    public function mount(salidaUrb $salida)
    {
        $this->identify = rand();
        $this->salida = $salida;
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

    public function datos()
    {
        $this->fecha = $this->salida->fecha;
        $this->hora = $this->salida->hora;
        $this->idMotorizado = $this->salida->idMotorizado;
        $this->open = true;
    }

    public function update()
    {
        $this->validate();
        $this->salida->fecha = $this->fecha;
        $this->salida->hora = $this->hora;
        $this->salida->idMotorizado = $this->idMotorizado;
        $this->salida->update();
        $bitacora = new bitacora();
        $bitacora->crear('Modificó una salida con código: ' . $this->salida->id);
        $this->reset(['open', 'fecha', 'hora',  'idMotorizado']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }
    public function render()
    {
        $motorizados = motorizado::all();
        return view('livewire.seguridad.salida.lw-show-salida', compact('motorizados'));
    }
}
