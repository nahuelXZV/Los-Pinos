<?php

namespace App\Http\Livewire\Personal\Personal;

use Livewire\Component;
use App\Models\personal;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;



class ShowPersonal extends Component
{

    use WithPagination;

    public $search = "";
    public $sort = 'codigo';
    public $direction = 'desc';
    public $cant = 10;
   
    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'codigo'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $personals = personal::where('codigo', 'like', '%' . $this->search . '%')
            ->orWhere('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('carnet', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);

        return view('livewire.personal.personal.show-personal', compact('personals'));
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
    
    public function delete(personal $personal)
    {
        $miembro = $personal;
        $personal->delete();
        DB::statement('CALL newBitacora(?,?,?,?)', [now()->format('Y-m-d'), now()->format('H:i'), 'Eliminó al miembro del personal: ' . $miembro->nombre . ' con código: ' . $miembro->codigo, auth()->user()->id]);
        $this->emit('alert', 'Eliminado Correctamente!');
        $this->reset();
    }
}
