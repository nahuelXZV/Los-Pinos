<?php

namespace App\Http\Livewire\AreaComun\Reserva;

use App\Models\bitacora;
use App\Models\invitado;
use App\Models\reserva;
use App\Models\visitante;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class LwShowReserva extends Component
{
    use WithPagination;

    //Atributos de la vista
    public $search = '';
    public $sort = 'id';
    public $direction = 'asc';
    public $pagination = 10;
    public $open_edit = false;
    public $identify;
    protected $listeners = [
        'delete' => 'delete',
        'actualizar' => 'actualizar',
        'eliminar' => 'eliminar',
        'guardar' => 'guardar',
    ];

    //Atributos de la clase
    public $reserva;
    public $idR;
    public $fecha;
    public $horaIni;
    public $horaFin;
    public $codigoAC;

    //Reglas de validacion
    protected $rules = [
        'fecha' => 'required',
        'horaIni' => 'required',
        'horaFin' => 'required',
    ];

    //Mensajes de validacion
    protected $messages = [
        'fecha.required' => 'El campo fecha es obligatorio.',
        'horaIni.required' => 'El campo hora de inicio es obligatorio.',
        'horaFin.required' => 'El campo hora de final es obligatorio.',
    ];

    //Inicializador
    public function mount(reserva $reserva)
    {
        $this->identify = rand();
        $this->reserva = $reserva;
    }

    //Metodo de ordenado
    public function order($sort)
    {
        if ($this->sort == $sort) {

            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    //Metodo de reinicio de buscador
    public function updatingSearch()
    {
        $this->resetPage();
    }

    //Abrir modal de editar
    public function open_modal_edit()
    {
        $this->idR = $this->reserva->id;
        $this->fecha = $this->reserva->fecha;
        $this->horaIni = $this->reserva->horaIni;
        $this->horaFin = $this->reserva->horaFin;
        $this->codigoAC = $this->reserva->codigoAC;
        $this->open_edit = true;
    }
    //Metodo de actualizar
    public function update()
    {
        $this->validate();
        if ($this->disponibilidad_edit()) {
            $this->emit('alert', 'Horario no disponible');
            $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'open_edit']);
            $this->identify = rand();
            return;
        }
        $this->reserva->fecha = $this->fecha;
        $this->reserva->horaIni = $this->horaIni;
        $this->reserva->horaFin = $this->horaFin;
        $this->reserva->start = $this->fecha;
        $this->reserva->end = $this->fecha;
        $this->reserva->update();
        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó una reserva con código: ' . $this->idR, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Modificó una reserva con código: ' . $this->idR);
        $this->reset(['idR', 'fecha', 'horaIni', 'horaFin', 'open_edit']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente');
        $this->render();
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
    //Metodos de mensaje actualizar
    public function actualizar()
    {
        $this->render();
        $this->emit('alert', 'Actualizado Correctamente');
    }
    //Metodos de mensaje guardar
    public function guardar()
    {
        $this->render();
        $this->emit('alert', 'Añadido Correctamente');
    }
    //Metodos de mensaje eliminar
    public function eliminar()
    {
        $this->render();
        $this->emit('alert', 'Eliminado Correctamente');
    }

    //Metodo de renderizado
    public function render()
    {
        return view('livewire.area-comun.reserva.lw-show-reserva');
    }
}
