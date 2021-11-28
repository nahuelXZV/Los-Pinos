<?php

namespace App\Http\Livewire\AreaComun;

use App\Models\invitado;
use Livewire\Component;
use App\Models\visitante;

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
        $ultimoadd = visitante::latest('id')->first();
        invitado::create([
            'idVisitante' => $ultimoadd->id,
            'codigoRes' => $this->codigoRes,
            'horaIngreso' => $this->horaIngreso,
            'horaSalida' => $this->horaSalida,
        ]);
        $this->reset(['open', 'nombre', 'numeroDeCarnet', 'sexo', 'horaIngreso', 'horaSalida']);
        $this->identify = rand();
        $this->emit('NewInvitado');
    }
    public function render()
    {
        return view('livewire.area-comun.lw-add-visitante');
    }
}
