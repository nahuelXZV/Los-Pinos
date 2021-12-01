<?php

namespace App\Http\Livewire\AreaComun;

use Livewire\Component;
use App\Models\reserva;
use Illuminate\Support\Carbon;
use App\Models\areaComun;
use App\Models\residente;
use Illuminate\Support\Facades\DB;

class LwReserva extends Component
{
    public $open = false;
    public $open_edit = false;
    public $reserv;
    public $areas;
    public $residentes;
    public $lastCD;
    public $nombreRes;
    public $identify;

    public $idR;
    public $fecha;
    public $horaIni;
    public $horaFin;
    public $cantsPers;
    public $title;
    public $start;
    public $end;
    public $idResidente = 1;
    public $codigoAC = 101;

    public $NareaComun;
    public $Nresidente;

    protected $listeners = ['register' => 'register', 'edit' => 'edit', 'delete' => 'delete'];
    protected $rules = [
        'idR' => 'required',
        'fecha' => 'required',
        'horaIni' => 'required',
        'horaFin' => 'required',
        'cantsPers' => 'required',
        'idResidente' => 'required',
        'codigoAC' => 'required',
        'title' => 'required',
        'start' => 'required',
        'end' => 'required',
    ];
    protected $messages = [
        'horaIni.required' => 'El campo hora de inicio es obligatorio.',
        'horaFin.required' => 'El campo hora de final es obligatorio.',
        'cantsPers.required' => 'El campo cantidad de personas es obligatorio.',
        'idResidente.required' => 'El campo residente es obligatorio.',
        'codigoAC.required' => 'El campo área común es obligatorio.',
    ];
    public function mount($areas, $residentes)
    {
        $this->identify = rand();
        $this->reserv = new reserva();
        $this->areas = $areas;
        $this->residentes = $residentes;
    }

    public function render()
    {
        return view('livewire.area-comun.lw-reserva');
    }

    public function register($date)
    {
        $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'cantsPers', 'codigoAC', 'idResidente', 'title', 'start', 'end', 'open']);
        $this->lastCD = reserva::latest('id')->first();
        $this->idR = $this->lastCD->id + 1;
        $this->start = $date;
        $this->end = $date;
        $this->fecha = $date;
        $this->open = true;
    }
    public function save()
    {
        $this->start = $this->fecha;
        $this->end = $this->fecha;
        $this->nombreRes = residente::find($this->idResidente);
        $this->title =  $this->nombreRes->nombre;
        $this->validate();
        reserva::create([
            'id' => $this->idR,
            'fecha' => $this->fecha,
            'horaIni' => $this->horaIni,
            'horaFin' => $this->horaFin,
            'cantsPers' => $this->cantsPers,
            'title' => $this->title,
            'start' => $this->start,
            'end' => $this->end,
            'idResidente' => $this->idResidente,
            'codigoAC' => $this->codigoAC
        ]);
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió un nueva reserva con código: ' . $this->idR, auth()->user()->id]);
        $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'cantsPers', 'codigoAC', 'idResidente', 'title', 'start', 'end', 'open']);
        $this->identify = rand();
        return redirect()->route('reserva');
    }
    public function edit($id)
    {
        $reserv = reserva::find($id);
        $this->idR = $reserv->id;
        $this->fecha = $reserv->fecha;
        $this->horaIni = $reserv->horaIni;
        $this->horaFin = $reserv->horaFin;
        $this->cantsPers = $reserv->cantsPers;
        $this->idResidente = $reserv->idResidente;
        $this->codigoAC = $reserv->codigoAC;
        $this->title = $reserv->title;
        $this->start = Carbon::createFromFormat('Y-m-d H:i:s', $reserv->start)->format('Y-m-d');
        $this->end = Carbon::createFromFormat('Y-m-d H:i:s', $reserv->end)->format('Y-m-d');
        $this->Nresidente = residente::find($reserv->idResidente)->nombre;
        $this->NareaComun = areaComun::find($reserv->codigoAC)->nombre;
        $this->open_edit = true;
    }
    public function editar()
    {
        $this->validate();
        $reserva = reserva::find($this->idR);
        $reserva->fecha = $this->fecha;
        $reserva->horaIni = $this->horaIni;
        $reserva->horaFin = $this->horaFin;
        $reserva->cantsPers = $this->cantsPers;
        $reserva->idResidente = $this->idResidente;
        $reserva->codigoAC = $this->codigoAC;
        $reserva->title = $this->title;
        $reserva->start = $this->start;
        $reserva->end = $this->end;
        $reserva->save();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó la reserva con código: ' . $this->idR, auth()->user()->id]);
        $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'cantsPers', 'codigoAC', 'idResidente', 'title', 'start', 'end', 'open_edit']);
        $this->identify = rand();
        return redirect()->route('reserva');
    }

    public function delete($idReserva)
    {
        $reserva = reserva::find($idReserva);
        $reserva->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó la reserva con código: ' . $idReserva, auth()->user()->id]);
        return redirect()->route('reserva');
    }
    public function openModal()
    {
        $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'cantsPers', 'codigoAC', 'idResidente', 'title', 'start', 'end', 'open']);
        $this->lastCD = reserva::latest('id')->first();
        $this->idR = $this->lastCD->id + 1;
        $this->open = true;
    }

    public function invitados()
    {
        $this->start = $this->fecha;
        $this->end = $this->fecha;
        $this->nombreRes = residente::find($this->idResidente);
        $this->title =  $this->nombreRes->nombre;
        $this->validate();
        reserva::create([
            'id' => $this->idR,
            'fecha' => $this->fecha,
            'horaIni' => $this->horaIni,
            'horaFin' => $this->horaFin,
            'cantsPers' => $this->cantsPers,
            'title' => $this->title,
            'start' => $this->start,
            'end' => $this->end,
            'idResidente' => $this->idResidente,
            'codigoAC' => $this->codigoAC
        ]);
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió un nueva reserva con código: ' . $this->idR, auth()->user()->id]);
        $this->reset(['fecha', 'horaIni', 'horaFin', 'cantsPers', 'codigoAC', 'idResidente', 'title', 'start', 'end', 'open']);
        $this->identify = rand();
        return redirect()->route('reserva.show', $this->idR);
    }
}
