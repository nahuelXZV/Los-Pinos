<?php

namespace App\Http\Livewire\AreaComun\Reserva;

use App\Models\invitado;
use Livewire\Component;
use App\Models\visitante;
use Illuminate\Support\Facades\DB;

class LwNewVisitante extends Component
{
    //Atributos de la vista
    public $open = false;

    //Atributos de la clase
    public $idR;
    public $nombre;
    public $numeroDeCarnet;
    public $sexo = 'M';
    public $codigoRes;
    public $horaIngreso;
    public $horaSalida;

    //Reglas de validacion
    protected $rules = [
        'nombre' => 'required',
        'numeroDeCarnet' => 'required',
        'sexo' => 'required',
    ];

    //Mensajes de validacion
    protected $messages = [
        'numeroDeCarnet.required' => 'El campo Numero de carnet es obligatorio.',
    ];

    //Inicializador
    public function mount($codigoRes)
    {
        $this->identify = rand();
        $this->codigoRes = $codigoRes;
    }

    //Metodo de guardar
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
        DB::table('reservas')->increment('cantsPers');
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió un nuevo invitado con nombre ' . $this->nombre . ' a la reserva con código: ' . $this->codigoRes, auth()->user()->id]);
        $this->reset(['open', 'nombre', 'numeroDeCarnet', 'sexo', 'horaIngreso', 'horaSalida']);
        $this->identify = rand();
        $this->emitTo('area-comun.reserva.lw-lista-invitados', 'guardar');
    }

    //Renderizado
    public function render()
    {
        return view('livewire.area-comun.reserva.lw-new-visitante');
    }
}
