<?php

namespace App\Http\Livewire\AreaComun\Reserva;

use Livewire\Component;
use App\Models\residente;
use App\Models\areaComun;
use App\Models\reserva;
use Illuminate\Support\Facades\DB;

class LwAddReserva extends Component
{
    //Atributos de la vista
    public $open_add = false;
    public $identify;

    //Atributos de la clase
    public $idR;
    public $fecha;
    public $horaIni;
    public $horaFin;
    public $cantsPers;
    public $title;
    public $start;
    public $end;
    public $idResidente;
    public $codigoAC;

    //Reglas de validacion
    protected $rules = [
        'fecha' => 'required',
        'horaIni' => 'required',
        'horaFin' => 'required',
        'idResidente' => 'required',
        'codigoAC' => 'required',
        'title' => 'required',
        'start' => 'required',
        'end' => 'required'
    ];

    //Mensajes de validacion
    protected $messages = [
        'horaIni.required' => 'El campo hora de inicio es obligatorio.',
        'horaFin.required' => 'El campo hora de final es obligatorio.',
        'idResidente.required' => 'El campo residente es obligatorio.',
        'codigoAC.required' => 'El campo área común es obligatorio.',
    ];

    //Iniciador
    public function mount()
    {
        $this->identify = rand();
        $residente = residente::all()->first();
        $area = areaComun::all()->first();
        $this->idResidente = $residente->id;
        $this->codigoAC = $area->codigo;
    }

    //Abrir modal de añadir
    public function open_modal_add()
    {
        $this->open_add = true;
    }

    //Metodo de guardar
    public function save()
    {
        $this->start = $this->fecha;
        $this->end = $this->fecha;
        $nombreRes = residente::find($this->idResidente);
        $this->title =  $nombreRes->nombre;
        $this->validate();
        if ($this->disponibilidad()) {
            $this->emit('alert', 'Horario no disponible');
            $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'cantsPers', 'codigoAC', 'idResidente', 'title', 'start', 'end', 'open_add']);
            $this->identify = rand();
            return;
        }
        reserva::create([
            'fecha' => $this->fecha,
            'horaIni' => $this->horaIni,
            'horaFin' => $this->horaFin,
            'cantsPers' => 0,
            'title' => $this->title,
            'start' => $this->start,
            'end' => $this->end,
            'idResidente' => $this->idResidente,
            'codigoAC' => $this->codigoAC
        ]);
        $last = reserva::latest('id')->first();
        $this->idR = $last->id;
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió una reserva con código: ' . $this->idR, auth()->user()->id]);
        $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'cantsPers', 'codigoAC', 'idResidente', 'title', 'start', 'end', 'open_add']);
        $this->identify = rand();
        $this->emit('actualizar');
    }

    //Metodo de guardar y añadir invitados
    public function invitados()
    {
        $this->start = $this->fecha;
        $this->end = $this->fecha;
        $nombreRes = residente::find($this->idResidente);
        $this->title =  $nombreRes->nombre;
        $this->validate();
        if ($this->disponibilidad()) {
            $this->emit('alert', 'Horario no disponible');
            $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'cantsPers', 'codigoAC', 'idResidente', 'title', 'start', 'end', 'open_add']);
            $this->identify = rand();
            return;
        }
        reserva::create([
            'fecha' => $this->fecha,
            'horaIni' => $this->horaIni,
            'horaFin' => $this->horaFin,
            'cantsPers' => 0,
            'title' => $this->title,
            'start' => $this->start,
            'end' => $this->end,
            'idResidente' => $this->idResidente,
            'codigoAC' => $this->codigoAC
        ]);
        $last = reserva::latest('id')->first();
        $this->idR = $last->id;
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió un nueva reserva con código: ' . $this->idR, auth()->user()->id]);
        $this->reset(['fecha', 'horaIni', 'horaFin', 'cantsPers', 'codigoAC', 'idResidente', 'title', 'start', 'end', 'open_add']);
        $this->identify = rand();
        return redirect()->route('reserva.show', $this->idR);
    }

    //Vefiricador de disponibilidad de horario y fecha
    public function disponibilidad()
    {
        $contador1 = DB::table('reservas')->where('codigoAC', '=', $this->codigoAC)
            ->where('fecha', '=', $this->fecha)
            ->WhereBetween('horaIni', [$this->horaIni, $this->horaFin])
            ->count();
        $contador2 = DB::table('reservas')->where('codigoAC', '=', $this->codigoAC)
            ->where('fecha', '=', $this->fecha)
            ->WhereBetween('horaFin', [$this->horaIni, $this->horaFin])
            ->count();
        $contador3 = DB::table('reservas')->where('codigoAC', '=', $this->codigoAC)
            ->where('fecha', '=', $this->fecha)
            ->where('horaIni', '<', $this->horaIni)
            ->where('horaFin', '>', $this->horaIni)
            ->count();
        $contador4 = DB::table('reservas')->where('codigoAC', '=', $this->codigoAC)
            ->where('fecha', '=', $this->fecha)
            ->where('horaIni', '<', $this->horaFin)
            ->where('horaFin', '>', $this->horaFin)
            ->count();
        $contador = $contador1 + $contador2 + $contador3 + $contador4;
        return $contador > 0;
    }

    //metodo de renderizado
    public function render()
    {
        $areas = areaComun::all();
        $residentes = residente::all();
        return view('livewire.area-comun.reserva.lw-add-reserva', compact('areas', 'residentes'));
    }
}
