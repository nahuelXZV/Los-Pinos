<?php

namespace App\Http\Livewire\AreaComun\Reserva;

use App\Models\reserva;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\residente;
use App\Models\areaComun;
use Illuminate\Support\Facades\DB;

class LwReserva extends Component
{
    use WithPagination;

    //Atributos de la vista
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    public $identify;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];

    //Iniciador
    public function mount()
    {
        $this->identify = rand();
        $residente = residente::all()->first();
        $area = areaComun::all()->first();
        $this->idResidente = $residente->id;
        $this->codigoAC = $area->codigo;
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

    //Actualizar Vista luego de añadir
    public function actualizar()
    {
        $this->render();
        $this->emit('alert', 'Añadido Correctamente!');
    }

    //Metodo de eliminar
    public function delete(reserva $reserva)
    {
        $codigoRes = $reserva->id;
        $reserva->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó una reserva con código: ' . $codigoRes, auth()->user()->id]);
        $this->emit('alert', 'Eliminado Correctamente');
    }

    //Metodo de renderizado
    public function render()
    {
        $reservas = reserva::where('id', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        return view('livewire.area-comun.reserva.lw-reserva', compact('reservas'));
    }
}
