<?php

namespace App\Http\Livewire\Seguridad\Motorizado;

use App\Models\motorizado;
use Livewire\Component;

class LwMotorizado extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];
    public $open = false;
    public $identify;

    public $placa;
    public $descripcion;
    public $sexo;


    protected $rules = [
        'nombre' => 'required',
        'numeroDeCarnet' => 'required',
        'sexo' => 'required',
    ];

    public function mount()
    {
        $this->identify = rand();
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
        $this->emit('alert', 'Añadido Correctamente!');
        $this->render();
    }

    public function datos($idPersona)
    {
        $this->persona = visitante::find($idPersona);
        $this->nombre = $this->persona->nombre;
        $this->numeroDeCarnet = $this->persona->nroCarnet;
        $this->sexo = $this->persona->sexo;
        $this->open = true;
    }

    public function update()
    {
        $this->validate();
        $this->persona->nombre = $this->nombre;
        $this->persona->nroCarnet = $this->numeroDeCarnet;
        $this->persona->sexo = $this->sexo;
        $this->persona->save();
        $this->reset(['open', 'nombre', 'numeroDeCarnet', 'sexo']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }

    public function delete(motorizado $persona)
    {
        $persona->delete();
    }
    public function render()
    {
        $motorizados = motorizado::where('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('nroCarnet', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        return view('livewire.seguridad.motorizado.lw-motorizado', compact('motorizados'));
    }
}
