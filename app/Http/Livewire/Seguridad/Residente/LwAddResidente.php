<?php

namespace App\Http\Livewire\Seguridad\Residente;

use App\Models\bitacora;
use App\Models\residente;
use App\Models\vivienda;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class LwAddResidente extends Component
{
    public $open_add = false;
    public $nombre;
    public $numeroDeCarnet;
    public $sexo = 'M';
    public $telefono;
    public $tipoResidente = 'Propietario';
    public $idVivienda;

    protected $rules = [
        'nombre' => 'required',
        'numeroDeCarnet' => 'required',
        'sexo' => 'required',
        'telefono' => 'required',
        'tipoResidente' => 'required',
    ];

    protected $messages = [
        'numeroDeCarnet.required' => 'El campo número de carnet es obligatorio.',
        'tipoResidente.required' => 'El campo tipo de residente es obligatorio.',
    ];
    
    public function mount()
    {
        $primero = vivienda::all()->first();
        $this->idVivienda = $primero->id;
        $this->identify = rand();
    }

    public function save()
    {
        $this->validate();
        residente::create([
            'nombre' => $this->nombre,
            'nroCarnet' => $this->numeroDeCarnet,
            'sexo' => $this->sexo,
            'telefono' => $this->telefono,
            'tipoResidente' => $this->tipoResidente,
            'idVivienda' => $this->idVivienda
        ]);
        // DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió un nuevo residente llamado: ' . $this->nombre, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Añadió un nuevo residente llamado: ' . $this->nombre);
        $this->reset(['open_add', 'nombre', 'numeroDeCarnet', 'sexo', 'telefono', 'tipoResidente', 'idVivienda']);
        $this->identify = rand();
        $this->emit('actualizar');
    }

    public function render()
    {
        $viviendas = vivienda::all();
        return view('livewire.seguridad.residente.lw-add-residente', compact('viviendas'));
    }
}
