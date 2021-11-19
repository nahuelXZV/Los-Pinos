<?php

namespace App\Http\Livewire\Seguridad\Residente;

use App\Models\residente;
use App\Models\vivienda;
use Livewire\Component;
use Livewire\WithPagination;

class LwResidente extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];
    public $open = false;
    public $identify;

    public $nombre;
    public $numeroDeCarnet;
    public $sexo;
    public $telefono;
    public $tipoResidente;
    public $idVivienda;

    protected $rules = [
        'nombre' => 'required',
        'numeroDeCarnet' => 'required',
        'sexo' => 'required',
        'telefono' => 'required',
        'tipoResidente' => 'required',
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
        $this->persona = residente::find($idPersona);
        $this->nombre = $this->persona->nombre;
        $this->numeroDeCarnet = $this->persona->nroCarnet;
        $this->sexo = $this->persona->sexo;
        $this->telefono = $this->persona->telefono;
        $this->tipoResidente = $this->persona->tipoResidente;
        $this->idVivienda = $this->persona->idVivienda;
        $this->open = true;
    }

    public function update()
    {
        $this->validate();
        $this->persona->nombre = $this->nombre;
        $this->persona->nroCarnet = $this->numeroDeCarnet;
        $this->persona->sexo = $this->sexo;
        $this->persona->telefono = $this->telefono;
        $this->persona->tipoResidente = $this->tipoResidente;
        $this->persona->idVivienda = $this->idVivienda;
        $this->persona->save();
        $this->reset(['open', 'nombre', 'numeroDeCarnet', 'sexo', 'telefono', 'tipoResidente', 'idVivienda']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }

    public function delete(residente $persona)
    {
        $persona->delete();
    }

    public function render()
    {
        $residentes = residente::where('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('nroCarnet', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        $viviendas = vivienda::all();
        return view('livewire.seguridad.residente.lw-residente', compact('residentes', 'viviendas'));
    }
}