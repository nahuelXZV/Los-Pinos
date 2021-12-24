<?php

namespace App\Http\Livewire\AreaComun\Calendario;

use Livewire\Component;
use App\Models\reserva;
use Illuminate\Support\Carbon;
use App\Models\areaComun;
use App\Models\bitacora;
use App\Models\residente;
use Database\Seeders\ModuloAreaComunSeeder;
use Illuminate\Support\Facades\DB;

class LwReservaCalendario extends Component
{
    //Atributos de la vista
    public $open_add = false;
    public $open_edit = false;
    public $identify;
    public $residentes;
    public $areas;
    public $reserva;
    public $NareaComun;
    public $Nresidente;
    protected $listeners = [
        'obtener_fecha_calendario' => 'obtener_fecha_calendario',
        'open_modal_edit' => 'open_modal_edit',
        'delete' => 'delete'
    ];

    //Atributos de la clase
    public $idR;
    public $fecha;
    public $horaIni;
    public $horaFin;
    public $idResidente;
    public $codigoAC;

    //Reglas de validacion
    protected $rules = [
        'fecha' => 'required',
        'horaIni' => 'required',
        'horaFin' => 'required',
        'idResidente' => 'required',
        'codigoAC' => 'required',
    ];

    //Mensajes de validacion
    protected $messages = [
        'horaIni.required' => 'El campo hora de inicio es obligatorio.',
        'horaFin.required' => 'El campo hora de final es obligatorio.',
        'idResidente.required' => 'El campo residente es obligatorio.',
        'codigoAC.required' => 'El campo área común es obligatorio.',
    ];

    //Iniciador
    public function mount($areas, $residentes)
    {
        $this->identify = rand();
        $this->reserv = new reserva();
        $this->areas = $areas;
        $this->residentes = $residentes;
        $areasc = areaComun::all()->first();
        $residente = residente::all()->first();
        $this->idResidente = $residente->id;
        $this->codigoAC = $areasc->codigo;
    }

    //Abrir modal de añadir
    public function open_modal_add()
    {
        $this->reset(['idR', 'fecha', 'horaIni', 'horaFin']);
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
            $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'codigoAC', 'idResidente',  'open_add']);
            $this->identify = rand();
            return;
        }
        reserva::create([
            'fecha' => $this->fecha,
            'horaIni' => $this->horaIni,
            'horaFin' => $this->horaFin,
            'title' => $this->title,
            'start' => $this->start,
            'end' => $this->end,
            'idResidente' => $this->idResidente,
            'codigoAC' => $this->codigoAC
        ]);
        $last = reserva::latest('id')->first();
        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió un nueva reserva con código: ' . $last->id, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Añadió un nueva reserva con código: ' . $last->id);
        $this->reset(['idR', 'fecha', 'horaIni', 'horaFin',  'codigoAC', 'idResidente', 'open_add']);
        $this->identify = rand();
        return redirect()->route('reserva');
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
            $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'codigoAC', 'idResidente', 'open_add']);
            $this->identify = rand();
            return;
        }
        reserva::create([
            'fecha' => $this->fecha,
            'horaIni' => $this->horaIni,
            'horaFin' => $this->horaFin,
            'title' => $this->title,
            'start' => $this->start,
            'end' => $this->end,
            'idResidente' => $this->idResidente,
            'codigoAC' => $this->codigoAC
        ]);
        $last = reserva::latest('id')->first();
        // DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió un nueva reserva con código: ' . $last->id, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Añadió un nueva reserva con código: ' . $last->id);
        $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'codigoAC', 'idResidente', 'open_add']);
        $this->identify = rand();
        return redirect()->route('reserva.show', $last->id);
    }

    //Metodo de obtener la fecha al presionar un dia del calentario ADD
    public function obtener_fecha_calendario($date)
    {
        $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'open_add']);
        $this->start = $date;
        $this->end = $date;
        $this->fecha = $date;
        $this->open_add = true;
    }

    //Metodo editar una reserva al presionar en el calendario
    public function open_modal_edit($id)
    {
        $this->reserva = reserva::find($id);
        $this->idR = $this->reserva->id;
        $this->fecha = $this->reserva->fecha;
        $this->horaIni = $this->reserva->horaIni;
        $this->horaFin = $this->reserva->horaFin;
        $this->idResidente = $this->reserva->idResidente;
        $this->codigoAC = $this->reserva->codigoAC;
        $this->Nresidente = residente::find($this->reserva->idResidente)->nombre;
        $this->NareaComun = areaComun::find($this->reserva->codigoAC)->nombre;
        $this->open_edit = true;
    }

    //Metodo para editar
    public function update()
    {
        $this->validate();
        if ($this->disponibilidad_edit()) {
            $this->emit('alert', 'Horario no disponible');
            $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'codigoAC', 'idResidente', 'open_edit']);
            $this->identify = rand();
            return;
        }
        $this->reserva->fecha = $this->fecha;
        $this->reserva->horaIni = $this->horaIni;
        $this->reserva->horaFin = $this->horaFin;
        $this->reserva->start = $this->fecha;
        $this->reserva->end = $this->fecha;
        $this->reserva->update();
        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó la reserva con código: ' . $this->idR, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Modificó la reserva con código: ' . $this->idR);
        $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'codigoAC', 'idResidente', 'open_edit']);
        $this->identify = rand();
        return redirect()->route('reserva');
    }

    //Metodo de eliminar
    public function delete($idReserva)
    {
        $reserva = reserva::find($idReserva);
        $reserva->delete();
        // DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó la reserva con código: ' . $idReserva, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Eliminó la reserva con código: ' . $idReserva);
        return redirect()->route('reserva');
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
    //Vefiricador de disponibilidad de horario y fecha
    public function disponibilidad_edit()
    {
        $contador1 = DB::table('reservas')->where('codigoAC', '=', $this->codigoAC)
            ->where('fecha', '=', $this->fecha)
            ->where('id', '<>', $this->idR)
            ->WhereBetween('horaIni', [$this->horaIni, $this->horaFin])
            ->count();
        $contador2 = DB::table('reservas')->where('codigoAC', '=', $this->codigoAC)
            ->where('fecha', '=', $this->fecha)
            ->where('id', '<>', $this->idR)
            ->WhereBetween('horaFin', [$this->horaIni, $this->horaFin])
            ->count();
        $contador3 = DB::table('reservas')->where('codigoAC', '=', $this->codigoAC)
            ->where('fecha', '=', $this->fecha)
            ->where('id', '<>', $this->idR)
            ->where('horaIni', '<', $this->horaIni)
            ->where('horaFin', '>', $this->horaIni)
            ->count();
        $contador4 = DB::table('reservas')->where('codigoAC', '=', $this->codigoAC)
            ->where('fecha', '=', $this->fecha)
            ->where('id', '<>', $this->idR)
            ->where('horaIni', '<', $this->horaFin)
            ->where('horaFin', '>', $this->horaFin)
            ->count();
        $contador = $contador1 + $contador2 + $contador3 + $contador4;
        return $contador > 0;
    }
    //Metodo de renderizado
    public function render()
    {
        return view('livewire.area-comun.calendario.lw-reserva-calendario');
    }
}
