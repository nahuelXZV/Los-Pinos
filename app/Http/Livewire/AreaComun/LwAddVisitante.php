<?php

namespace App\Http\Livewire\AreaComun;

use App\Models\invitado;
use Livewire\Component;
use App\Models\visitante;
use Illuminate\Support\Facades\DB;

class LwAddVisitante extends Component
{
    public $open = false;
    public $idR;
    public $nombre;
    public $numeroDeCarnet;
    public $sexo = 'M';
    public $codigoRes;
    public $horaIngreso;
    public $horaSalida;
    protected $rules = [
        'nombre' => 'required',
        'numeroDeCarnet' => 'required',
        'sexo' => 'required',
    ];
    protected $messages = [
        'numeroDeCarnet.required' => 'El campo Numero de carnet es obligatorio.',
    ];
    public function mount($codigoRes)
    {
        $this->identify = rand();
        $this->codigoRes = $codigoRes;
    }

    public function save()
    {
        $this->validate();
        visitante::create([
            'nombre' => $this->nombre,
            'nroCarnet' => $this->numeroDeCarnet,
            'sexo' => $this->sexo,
        ]);
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió un nuevo visitante con nombre: ' . $this->nombre, auth()->user()->id]);
        $ultimoadd = visitante::latest('id')->first();
        invitado::create([
            'idVisitante' => $ultimoadd->id,
            'codigoRes' => $this->codigoRes,
            'horaIngreso' => $this->horaIngreso,
            'horaSalida' => $this->horaSalida,
        ]);
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió un nuevo invitado con nombre ' . $this->nombre . ' a la reserva con código: ' . $this->codigoRes, auth()->user()->id]);
        $this->reset(['open', 'nombre', 'numeroDeCarnet', 'sexo', 'horaIngreso', 'horaSalida']);
        $this->identify = rand();
        $this->emit('NewInvitado');
    }
    public function render()
    {
        return view('livewire.area-comun.lw-add-visitante');
    }
}
