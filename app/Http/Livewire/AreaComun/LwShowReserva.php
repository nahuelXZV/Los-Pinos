<?php

namespace App\Http\Livewire\AreaComun;

use App\Models\invitado;
use App\Models\reserva;
use App\Models\visitante;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class LwShowReserva extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = 'id';
    public $direction = 'asc';
    public $pagination = 10;
    protected $listeners = ['delete' => 'delete', 'mensajeEdit' => 'actualizarDatos', 'NewInvitado' => 'NewInvitado'];
    public $open_editar = false;
    public $open_add = false;
    public $open_new = false;
    public $lastAC;
    public $identify;
    public $reserva;

    public $idVisitante = 1;
    public $nombre;
    public $nroCarnet;
    public $sexo;
    public $horaIngreso;
    public $horaSalida;
    public $idInvitado;

    protected $rules = [
        'idVisitante' => 'required',
    ];
    protected $messages = [
        'idVisitante.required' => 'El campo visitante es obligatorio.',
    ];
    public function mount($reserva)
    {
        $this->identify = rand();
        $this->reserva = $reserva;
    }

    public function render()
    {
        $lista = reserva::find($this->reserva->id)->invitado()
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)->get();
        $listVisitante = visitante::all();
        return view('livewire.area-comun.lw-show-reserva', compact('lista', 'listVisitante'));
    }
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
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function open_edit($idInvitado)
    {
        $horas = invitado::find($idInvitado);
        $visitante = visitante::find($horas->idVisitante);
        $this->idInvitado = $horas->id;
        $this->idVisitante = $visitante->id;
        $this->nombre = $visitante->nombre;
        $this->nroCarnet = $visitante->nroCarnet;
        $this->horaIngreso = $horas->horaIngreso;
        $this->horaSalida = $horas->horaSalida;
        $this->open_editar = true;
    }

    public function update()
    {
        $invitado = invitado::find($this->idInvitado);
        $invitado->horaIngreso =  $this->horaIngreso;
        $invitado->horaSalida =  $this->horaSalida;
        $invitado->save();
        $this->reset(['open_editar', 'idVisitante', 'nombre', 'nroCarnet', 'horaIngreso', 'horaSalida']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente');
    }

    public function save()
    {
        $this->validate();
        $contador = DB::table('invitados')->where('idVisitante', '=', $this->idVisitante)
            ->where('codigoRes', '=', $this->reserva->id)->count();
        if ($contador > 0) {
            $this->reset(['open_add', 'idVisitante', 'nombre', 'nroCarnet', 'horaIngreso', 'horaSalida']);
            $this->identify = rand();
            $this->emit('alert', 'Ya se encuentra en la lista');
        } else {
            invitado::create([
                'idVisitante' => $this->idVisitante,
                'codigoRes' => $this->reserva->id,
                'horaIngreso' => $this->horaIngreso,
                'horaSalida' => $this->horaSalida,
            ]);
            $this->reset(['open_add', 'idVisitante', 'nombre', 'nroCarnet', 'horaIngreso', 'horaSalida']);
            $this->identify = rand();
            $this->emit('alert', 'Añadido Correctamente');
        }
    }

    public function delete($invitadod)
    {
        $invitadode = invitado::find($invitadod);
        $invitadode->delete();
        $this->emit('alert', 'Eliminado Correctamente');
    }
    public function actualizarDatos($idreserva)
    {
        $this->reserva = reserva::find($idreserva);
        $this->emit('alert', 'Actualizado Correctamente');
    }
    public function NewInvitado()
    {
        $this->render();
        $this->emit('alert', 'Añadido Correctamente');
    }
}
