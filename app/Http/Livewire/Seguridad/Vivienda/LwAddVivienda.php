<?php

namespace App\Http\Livewire\Seguridad\Vivienda;

use App\Models\vivienda;
use Livewire\Component;

class LwAddVivienda extends Component
{
    public $nroCasa;
    public $calle;
    public $manzano;
    public $lote;
    public $estadoDeResidencia = 'Ocupado';
    public $estadoDeVivienda = 'Vendida';
    public $vivienda;
    public $open = false;

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
    
    public function save()
    {
        $this->validate();
        vivienda::create([
            'nroCasa' => $this->nroCasa,
            'calle' => $this->calle,
            'manzano' => $this->manzano,
            'lote' => $this->lote,
            'estadoResidencia' => $this->estadoDeResidencia,
            'estadoVivienda' => $this->estadoDeVivienda
        ]);
        $this->reset(['open', 'nroCasa', 'calle', 'manzano', 'lote', 'estadoDeResidencia', 'estadoDeVivienda']);
        $this->identify = rand();
        $this->emit('actualizar');
    }
    public function render()
    {
        return view('livewire.seguridad.vivienda.lw-add-vivienda');
    }
}
