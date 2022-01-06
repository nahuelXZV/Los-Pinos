<?php

namespace App\Http\Livewire\Seguridad\Visitante;

use App\Models\bitacora;
use App\Models\visitante;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class LwAddVisitante extends Component
{
    public $open_add = false;
    public $nombre;
    public $numeroDeCarnet;
    public $sexo = 'M';

    protected $rules = [
        'nombre' => 'required',
        'numeroDeCarnet' => 'required',
        'sexo' => 'required',
    ];

    protected $messages = [
        'numeroDeCarnet.required' => 'El campo número de carnet es obligatorio.',
    ];
    
    public function mount()
    {
        $this->identify = rand();
    }

    public function save()
    {
        $this->validate();
        visitante::create([
            'nombre' => $this->nombre,
            'nroCarnet' => $this->numeroDeCarnet,
            'sexo' => $this->sexo,
        ]);
        // DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió un nuevo visitante llamado: ' . $this->nombre, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Añadió un nuevo visitante llamado: ' . $this->nombre);
        $this->reset(['open_add', 'nombre', 'numeroDeCarnet', 'sexo']);
        $this->identify = rand();
        $this->emit('actualizar');
    }

    public function render()
    {
        return view('livewire.seguridad.visitante.lw-add-visitante');
    }
}
