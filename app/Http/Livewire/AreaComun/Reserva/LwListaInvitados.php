<?php

namespace App\Http\Livewire\AreaComun\Reserva;

use App\Models\bitacora;
use App\Models\invitado;
use App\Models\reserva;
use App\Models\visitante;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class LwListaInvitados extends Component
{
    use WithPagination;

    //Atributos de la vista
    public $search = '';
    public $sort = 'id';
    public $direction = 'asc';
    public $pagination = 10;
    public $identify;
    public $open_edit = false;
    public $open_add = false;
    protected $listeners = [
        'delete' => 'delete',
        'guardar' => 'guardar'
    ];

    //Atributos de la clase
    public $reserva;
    public $invitado;
    public $idVisitante;
    public $nombre;
    public $nroCarnet;
    public $sexo;
    public $horaIngreso;
    public $horaSalida;
    public $idInvitado;

    //Reglas de validacion
    protected $rules = [
        'idVisitante' => 'required',
    ];

    //Mensajes de validacion
    protected $messages = [
        'idVisitante.required' => 'El campo visitante es obligatorio.',
    ];

    //Inicializador
    public function mount($reserva)
    {
        $this->identify = rand();
        $this->reserva = reserva::find($reserva);
        $visitante = visitante::all()->first();
        $this->idVisitante = $visitante->id;
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
    public function open_modal_edit($idInvitado)
    {
        $this->invitado = invitado::find($idInvitado);
        $visitante = visitante::find($this->invitado->idVisitante);
        $this->idInvitado = $this->invitado->id;
        $this->idVisitante = $visitante->id;
        $this->nombre = $visitante->nombre;
        $this->nroCarnet = $visitante->nroCarnet;
        $this->horaIngreso = $this->invitado->horaIngreso;
        $this->horaSalida = $this->invitado->horaSalida;
        $this->open_edit = true;
    }

    //Metodo de editado
    public function update()
    {
        $this->invitado->horaIngreso =  $this->horaIngreso;
        $this->invitado->horaSalida =  $this->horaSalida;
        $this->invitado->update();
        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modifió un invitado con codigo ' . $this->invitado->idVisitante . ' de la reserva con código: ' . $this->reserva->id, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Modificó un invitado con código ' . $this->invitado->idVisitante . ' de la reserva con código: ' . $this->reserva->id);
        $this->reset(['open_edit', 'idVisitante', 'nombre', 'nroCarnet', 'horaIngreso', 'horaSalida']);
        $visitante = visitante::all()->first();
        $this->idVisitante = $visitante->id;
        $this->identify = rand();
        $this->emit('actualizar');
    }

    //Metodo de guardar
    public function save()
    {
        $this->validate();
        $contador = invitado::where('codigoRes', $this->reserva->id)
            ->where('idVisitante', $this->idVisitante)->count();
        if ($contador > 0) {
            $this->emit('alert', 'El visitante ya se encuentra registrado!');
            return;
        }
        invitado::create([
            'idVisitante' => $this->idVisitante,
            'codigoRes' => $this->reserva->id,
            'horaIngreso' => $this->horaIngreso,
            'horaSalida' => $this->horaSalida,
        ]);
        //DB::table('reservas')->increment('cantsPers');
        // DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Añadió un nuevo invitado con codigo ' . $this->idVisitante . ' a la reserva con código: ' . $this->reserva->id, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Añadió un nuevo invitado con código ' . $this->idVisitante . ' a la reserva con código: ' . $this->reserva->id);
        $this->reset(['open_add', 'idVisitante', 'nombre', 'nroCarnet', 'horaIngreso', 'horaSalida']);
        $this->identify = rand();
        $this->emit('guardar');
    }

    //Metodo de eliminacion
    public function delete($invitadod)
    {
        $invitado = invitado::find($invitadod);
        $invitado->delete();
        // DB::table('reservas')->decrement('cantsPers');
        //DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó un invitado con codigo ' . $invitado->id . ' de la reserva con código: ' . $this->reserva->id, auth()->user()->id]);
        $bitacora = new bitacora();
        $bitacora->crear('Eliminó un invitado con código ' . $invitado->id . ' de la reserva con código: ' . $this->reserva->id);
        $this->emit('eliminar');
    }

    //Metodo de mensaje de añadido
    public function guardar()
    {
        $this->render();
        $this->emit('alert', 'Añadido Correctamente');
    }
    //Renderizado
    public function render()
    {
        $lista = reserva::find($this->reserva->id)->invitado()
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)->get();
        $listVisitante = visitante::all();
        return view('livewire.area-comun.reserva.lw-lista-invitados', compact('lista', 'listVisitante'));
    }
}
