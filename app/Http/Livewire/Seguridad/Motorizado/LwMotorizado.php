<?php

namespace App\Http\Livewire\Seguridad\Motorizado;

use App\Models\motorizado;
use App\Models\residente;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\visitante;
use Illuminate\Support\Facades\DB;
class LwMotorizado extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $pagination = 10;
    protected $listeners = ['delete' => 'delete', 'actualizar' => 'actualizar'];
    public $open = false;
    public $identify;

    public $placa;
    public $descripcion;
    public $idResidente;
    public $idVisitante;
    public $motorizado;

    protected $rules = [
        'placa' => 'required'
    ];

    public function mount()
    {
        $this->identify = rand();
        $this->motorizado = new motorizado();


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

    public function actualizar()
    {
        $this->emit('alert', 'Añadido Correctamente!');
        $this->render();
    }

    public function datos($idMotorizado)
    {
        $this->motorizado = motorizado::find($idMotorizado);
        $this->placa = $this->motorizado->placa;
        $this->descripcion = $this->motorizado->descripcion;
        $this->sexo = $this->motorizado->sexo;
        if ($this->motorizado->idVisitante) {
            $this->idVisitante = $this->motorizado->idVisitante;
        } else {
            $this->idResidente = $this->motorizado->idResidente;
        }
        $this->open = true;
    }

    public function update()
    {
        $this->validate();
        $this->motorizado->placa = $this->placa;
        $this->motorizado->descripcion = $this->descripcion;
        $this->motorizado->idVisitante = $this->idVisitante;
        $this->motorizado->idResidente = $this->idResidente;
        $this->motorizado->save();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Modificó un motorizado con placa: ' . $this->placa, auth()->user()->id]);
        $this->reset(['open', 'descripcion', 'placa', 'idVisitante', 'idResidente']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente!');
    }

    public function delete(motorizado $motorizado)
    {
        $placa = $motorizado->placa;
        $motorizado->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó un motorizado con placa: ' . $placa, auth()->user()->id]);
        $this->emit('alert', 'Eliminado Correctamente!');
    }
    public function render()
    {
        $motorizados = motorizado::where('placa', 'like', '%' . $this->search . '%')
            ->orWhere('descripcion', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        $residentes = residente::all();
        $visitantes = visitante::all();
        return view('livewire.seguridad.motorizado.lw-motorizado', compact('motorizados', 'residentes', 'visitantes'));
    }
}
