<?php

namespace App\Http\Livewire\AreaComun;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\areaComun;

class LwAreaComun extends Component
{
    use WithPagination;
    public $search = '';
    public $sort = 'codigo';
    public $direction = 'desc';
    public $pagination = 10;
    public $area;
    protected $listeners = ['delete' => 'delete'];
    public $open_edit = false;
    public $open = false;
    public $lastAC;
    public $identify;

    public $codigo;
    public $nombre;
    public $calle;
    public $manzano;
    public $estadoRes = "Reservación";

    protected $rules = [
        'codigo' => 'required',
        'nombre' => 'required',
        'calle' => 'required',
        'manzano' => 'required',
        'estadoRes' => 'required',
    ];
    protected $messages = [
        'estadoRes.required' => 'El campo estado de reserva es obligatorio.'
    ];

    public function mount()
    {
        $this->identify = rand();
        $this->area = new areaComun();
    }
    public function render()
    {
        $areas = areaComun::where('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('codigo', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        return view('livewire.area-comun.lw-area-comun', compact('areas'));
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
    public function edit(areaComun $area)
    {
        $this->codigo = $area->codigo;
        $this->nombre = $area->nombre;
        $this->calle = $area->calle;
        $this->manzano = $area->manzano;
        $this->estadoRes = $area->estadoRes;
        $this->open_edit = true;
    }
    public function open()
    {
        $this->reset(['open', 'codigo', 'nombre', 'calle', 'manzano', 'estadoRes']);
        $this->lastAC = areaComun::latest('codigo')->first();
        $this->codigo = $this->lastAC->codigo + 1;
        $this->open = true;
    }
    public function save()
    {
        $this->validate();
        areaComun::create([
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
            'calle' => $this->calle,
            'manzano' => $this->manzano,
            'estadoRes' => $this->estadoRes
        ]);
        $this->reset(['open', 'codigo', 'nombre', 'calle', 'manzano', 'estadoRes']);
        $this->identify = rand();
        $this->emit('alert', 'Añadido Correctamente');
    }
    public function update()
    {
        $this->validate();
        $area = areaComun::find($this->codigo);
        $area->nombre = $this->nombre;
        $area->calle = $this->calle;
        $area->manzano = $this->manzano;
        $area->estadoRes = $this->estadoRes;
        $area->save();
        $this->reset(['open_edit', 'codigo', 'nombre', 'calle', 'manzano', 'estadoRes']);
        $this->identify = rand();
        $this->emit('alert', 'Actualizado Correctamente');
    }
    public function delete(areaComun $area)
    {
        $area->delete();
        $this->emit('alert', 'Eliminado Correctamente');
    }
}
