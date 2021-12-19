<?php

namespace App\Http\Livewire\Seguridad\Vivienda;

use App\Models\bitacora;
use App\Models\vivienda;
use Carbon\Carbon;
use Carbon\Doctrine\CarbonType;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
class LwAddVivienda extends Component
{
    public $nroCasa;
    public $calle;
    public $manzano;
    public $lote;
    public $estadoDeResidencia = 'Ocupado';
    public $estadoDeVivienda = 'Vendida';
    public $vivienda;
    public $open_add = false;

    protected $rules = [
        'nroCasa' => 'required|int|min:0|unique:viviendas',
        'calle' => 'required|max:50',
        'manzano' => 'required|int|min:0',
        'lote' => 'required|int|min:0',
        'estadoDeResidencia' => 'required',
        'estadoDeVivienda' => 'required',
    ];

    protected $messages = [
        'nroCasa.required' => 'El campo número de casa es obligatorio.',
        'nroCasa.unique' => 'El valor del campo número de casa ya esta en uso',
        'nroCasa.min' => 'El valor del campo número de casa debe ser mayor a 0',
        'manzano.min' => 'El valor del campo manzano debe ser mayor a 0',
        'lote.min' => 'El valor del campo lote debe ser mayor a 0',
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
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió una vivienda con número de casa: ' . $this->nroCasa, auth()->user()->id]);
        $this->reset(['open_add', 'nroCasa', 'calle', 'manzano', 'lote', 'estadoDeResidencia', 'estadoDeVivienda']);
        $this->identify = rand();
        $this->emit('actualizar');
    }
    public function render()
    {
        return view('livewire.seguridad.vivienda.lw-add-vivienda');
    }
}
