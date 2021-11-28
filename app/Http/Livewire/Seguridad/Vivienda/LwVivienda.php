<?php

namespace App\Http\Livewire\Seguridad\Vivienda;

use App\Models\vivienda;
use Livewire\Component;
use Livewire\WithPagination;

class LwVivienda extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];
    public $open = false;
    public $identify;

    public $nroCasa;
    public $calle;
    public $manzano;
    public $lote;
    public $estadoDeResidencia = 'Ocupado';
    public $estadoDeVivienda = 'Vendida';
    public $vivienda;

    protected $rules = [
        'nroCasa' => 'required|unique:viviendas',
        'calle' => 'required|max:50',
        'manzano' => 'required',
        'lote' => 'required',
        'estadoDeResidencia' => 'required',
        'estadoDeVivienda' => 'required',
    ];

    protected $messages = [
        'nroCasa.required' => 'El campo Numero de casa es obligatorio.',
        'nroCasa.unique' => 'El valor del campo Numero de casa ya esta en uso',
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
    public function datos($idVivienda)
    {
        $this->vivienda = vivienda::find($idVivienda);
        $this->nroCasa = $this->vivienda->nroCasa;
        $this->calle = $this->vivienda->calle;
        $this->manzano = $this->vivienda->manzano;
        $this->lote = $this->vivienda->lote;
        $this->estadoDeResidencia = $this->vivienda->estadoResidencia;
        $this->estadoDeVivienda = $this->vivienda->estadoVivienda;
        $this->open = true;
    }
    public function update()
    {
        $this->validate();
        $this->vivienda->nroCasa = $this->nroCasa;
        $this->vivienda->calle = $this->calle;
        $this->vivienda->manzano = $this->manzano;
        $this->vivienda->lote = $this->lote;
        $this->vivienda->estadoResidencia = $this->estadoDeResidencia;
        $this->vivienda->estadoVivienda = $this->estadoDeVivienda;
        $this->vivienda->save();
        $this->reset(['open', 'nroCasa', 'calle', 'manzano', 'lote', 'estadoDeResidencia', 'estadoDeVivienda']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }
    public function delete(vivienda $vivienda)
    {
        $vivienda->delete();
        $this->emit('alert', 'Eliminado Correctamente!');
    }
    public function render()
    {
        $viviendas = vivienda::where('nroCasa', 'like', '%' . $this->search . '%')
            ->orWhere('calle', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        return view('livewire.seguridad.vivienda.lw-vivienda', compact('viviendas'));
    }
}
